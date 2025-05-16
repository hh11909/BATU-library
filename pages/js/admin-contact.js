// Base path for API endpoints (adjust if your PHP files are in a subdirectory like 'api/')
const API_BASE_PATH = './'; // Assuming PHP files are in the same directory or accessible via this relative path

document.addEventListener('DOMContentLoaded', () => {
    const messagesTableBody = document.getElementById('messages-table-body');
    const loadingIndicator = document.getElementById('loading-indicator');
    const noMessagesAlert = document.getElementById('no-messages-alert');
    const searchButton = document.getElementById('search-button');
    const searchDateInput = document.getElementById('search-date');
    const viewMessageModal = new bootstrap.Modal(document.getElementById('viewMessageModal'));
    const modalSenderName = document.getElementById('modal-sender-name');
    const modalSenderEmail = document.getElementById('modal-sender-email');
    const modalStudentId = document.getElementById('modal-student-id');
    const modalMessageContent = document.getElementById('modal-message-content');

    let allMessages = []; // To store all fetched messages for client-side filtering

    // Function to display messages in the table
    function displayMessages(messagesToDisplay) {
        messagesTableBody.innerHTML = ''; // Clear existing rows
        if (messagesToDisplay.length === 0) {
            noMessagesAlert.style.display = 'block';
            return;
        }
        noMessagesAlert.style.display = 'none';

        messagesToDisplay.forEach(msg => {
            const row = messagesTableBody.insertRow();
            row.setAttribute('data-message-id', msg.contact_ID);
            // Add a created_at field if available from backend, otherwise use a placeholder or omit
            // For now, the backend Contact.php model doesn't explicitly show a timestamp field being selected or returned by default in readAllMessages
            // The example HTML had a 'Received' column, but the PHP doesn't provide it. I'll use a placeholder or remove it.
            // The PHP `Contact.php` model has `contact_ID, name, email, message, student_ID`.
            // The HTML table has ID, Sender, Email, Snippet, Actions. I'll add ID.

            // Create a snippet
            const snippet = msg.message.length > 50 ? msg.message.substring(0, 50) + '...' : msg.message;

            row.innerHTML = `
                <td data-label="ID">${msg.contact_ID}</td>
                <td data-label="Sender">${msg.name}</td>
                <td data-label="Email">${msg.email}</td>
                <td data-label="Snippet" class="message-snippet-cell">${snippet}</td>
                <td data-label="Actions" class="actions-cell text-center">
                    <button class="btn btn-sm btn-view-action me-1" title="View Message" data-id="${msg.contact_ID}"><i class="fas fa-eye"></i> View</button>
                    <button class="btn btn-sm btn-delete-action" title="Delete Message" data-id="${msg.contact_ID}"><i class="fas fa-trash-alt"></i> Delete</button>
                </td>
            `;
        });
        addEventListenersToButtons();
    }

    // Function to fetch all messages
    async function fetchAllMessages() {
        loadingIndicator.style.display = 'block';
        noMessagesAlert.style.display = 'none';
        messagesTableBody.innerHTML = '';
        try {
            const response = await fetch(`${API_BASE_PATH}readAll.php`);
            if (!response.ok) {
                if (response.status === 404) {
                    allMessages = [];
                    displayMessages([]);
                    throw new Error('No messages found (404).');
                } else {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
            }
            const data = await response.json();
            if (data.records && data.records.length > 0) {
                allMessages = data.records;
                displayMessages(allMessages);
            } else {
                allMessages = [];
                displayMessages([]); // Handles empty records array from a 200 OK response
            }
        } catch (error) {
            console.error('Error fetching messages:', error);
            noMessagesAlert.textContent = `Error loading messages: ${error.message}`;
            noMessagesAlert.style.display = 'block';
            allMessages = []; // Clear cache on error
        } finally {
            loadingIndicator.style.display = 'none';
        }
    }

    // Function to fetch a single message for viewing
    async function fetchMessageForView(id) {
        try {
            const response = await fetch(`${API_BASE_PATH}read.php?id=${id}`);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const messageData = await response.json();
            modalSenderName.textContent = messageData.name;
            modalSenderEmail.textContent = messageData.email;
            modalStudentId.textContent = messageData.student_ID ? messageData.student_ID : 'N/A';
            modalMessageContent.textContent = messageData.message;
            viewMessageModal.show();
        } catch (error) {
            console.error('Error fetching message details:', error);
            alert('Could not load message details. ' + error.message);
        }
    }

    // Function to delete a message
    async function deleteMessage(id) {
        if (!confirm('Are you sure you want to delete this message?')) {
            return;
        }
        try {
            const response = await fetch(`${API_BASE_PATH}delete.php?id=${id}`, {
                method: 'DELETE'
            });
            const result = await response.json(); // Even if not 200, backend sends JSON

            if (response.ok && result.message === "Message was deleted.") {
                alert('Message deleted successfully.');
                // Remove the row from the table visually
                const rowToRemove = messagesTableBody.querySelector(`tr[data-message-id='${id}']`);
                if(rowToRemove) rowToRemove.remove();
                // Also remove from our local cache and re-display if necessary (or re-fetch)
                allMessages = allMessages.filter(msg => msg.contact_ID !== id.toString()); // contact_ID might be string or number
                if (allMessages.length === 0 && messagesTableBody.rows.length === 0) {
                    noMessagesAlert.style.display = 'block';
                }
            } else {
                throw new Error(result.message || 'Failed to delete message.');
            }
        } catch (error) {
            console.error('Error deleting message:', error);
            alert('Could not delete message. ' + error.message);
        }
    }

    // Add event listeners to view and delete buttons (call after table is populated)
    function addEventListenersToButtons() {
        document.querySelectorAll('.btn-view-action').forEach(button => {
            button.addEventListener('click', (event) => {
                const messageId = event.currentTarget.getAttribute('data-id');
                fetchMessageForView(messageId);
            });
        });

        document.querySelectorAll('.btn-delete-action').forEach(button => {
            button.addEventListener('click', (event) => {
                const messageId = event.currentTarget.getAttribute('data-id');
                deleteMessage(messageId);
            });
        });
    }

    // Search/Filter functionality (Client-side based on fetched data)
    // The backend readAll.php does not support date filtering directly.
    // This will filter the `allMessages` array.
    if (searchButton) {
        searchButton.addEventListener('click', () => {
            const searchDateValue = searchDateInput.value;
            if (!searchDateValue) {
                displayMessages(allMessages); // Display all if search is cleared
                return;
            }
            // The backend doesn't provide a date_received field in the current API output for messages.
            // The Contact.php model (contact_ID, name, email, message, student_ID) lacks a timestamp.
            // So, direct date filtering as per the UI element is not possible with current backend data.
            // I will alert the user about this limitation.
            alert('Date filtering is not currently supported as message creation dates are not available from the backend.');
            // As a placeholder, if we had a date field, e.g., msg.created_at (YYYY-MM-DD format):
            // const filteredMessages = allMessages.filter(msg => msg.created_at === searchDateValue);
            // displayMessages(filteredMessages);
        });
    }

    // Initial fetch of messages
    fetchAllMessages();
});

