use library;
INSERT INTO books (name, author, image, description, admin_ID, is_borrowed)
VALUES 
('Python Programming for Biology', 'Tim J. Stevens', 'wishlist-images/book1.jpg', 
'A practical guide to using Python for biological data analysis, simulations, and modeling. Ideal for biologists and computational scientists.', 
NULL, 0),

('Data Visualization', 'Andy Kirk', 'wishlist-images/book2.jpg', 
'Master the art of translating complex datasets into clear visual narratives using modern tools and design principles.', 
NULL, 0),

('Algorithms to Live By', 'Brian Christian', 'wishlist-images/book3.jpg', 
'Explores how computer algorithms can optimize everyday decisions, from scheduling tasks to resolving conflicts.', 
NULL, 0),

('Human Compatible', 'Stuart Russell', 'wishlist-images/book5.jpg', 
'A groundbreaking examination of AI ethics and safety, proposing frameworks for aligning AI with human values.', 
NULL, 0),

('Design for How People Think', 'John Whalen', 'wishlist-images/book4.jpg', 
'Leverage cognitive psychology to create intuitive user experiences by understanding mental models and decision-making.', 
NULL, 0),

('Artificial Intelligence Accelerated human learning', 'Katashi Nagao', 'wishlist-images/book (7).jpg', 
'Explores AI-driven educational tools and adaptive learning systems that personalize knowledge acquisition.', 
NULL, 0),

('Algorithms for Image Processing and Computer Vision', 'J.R.Parker', 'wishlist-images/book (8).jpg', 
'Hands-on techniques for image enhancement, object detection, and pattern recognition using computational methods.', 
NULL, 0),

('Intro to Python', 'Paul Deitel', 'wishlist-images/book (9).jpg', 
'Foundational Python programming concepts with real-world examples for beginners in coding and automation.', 
NULL, 0),

('Python for Excel', 'Felix Zumstien', 'wishlist-images/book (10).jpg', 
'Bridge Excel workflows with Python scripting to automate data tasks, generate reports, and enhance analytics.', 
NULL, 0),

('Computation for Neuroscience', 'Paul Miller', 'wishlist-images/book (11).jpg', 
'Computational models and algorithms for simulating neural networks and analyzing brain activity data.', 
NULL, 0),

('Quantum Computing for Computer Scientists', 'Noson S.yanofsky', 'wishlist-images/book (12).jpg', 
'Demystifies quantum algorithms, qubits, and their potential to revolutionize cryptography and optimization.', 
NULL, 0),

('High Performance Python', 'Micha Gorelick', 'wishlist-images/book (13).jpg', 
'Optimize Python code for speed and scalability using advanced profiling, parallel processing, and memory management.', 
NULL, 0),

('Foundations of Computer Vision', 'James F.Peters', 'wishlist-images/book (14).jpg', 
'Core principles of image analysis, feature extraction, and machine learning integration for vision systems.', 
NULL, 0),

('Algorithmic Intelligence', 'Stefan Edelkamp', 'wishlist-images/book (15).jpg', 
'Advanced algorithms for AI applications, including search optimization, game theory, and autonomous systems.', 
NULL, 0),

('Hands-on Machine Learning with Scikit-Learn Keras & Tensorflow', 'Aurelien geron', 'wishlist-images/book (16).jpg', 
'Build, train, and deploy ML models using industry-standard frameworks, with end-to-end project examples.', 
NULL, 0),

('Indexing It All', 'Ronald E.Day', 'wishlist-images/book (17).jpg', 
'A deep dive into information organization, metadata systems, and search algorithms for digital libraries.', 
NULL, 0),

('Computational Homotopy', 'Graham Ellis', 'wishlist-images/book (18).jpg', 
'Mathematical methods for topological data analysis, with applications in computational biology and network theory.', 
NULL, 0),

('Data Science & Complex Networks', 'Guido Caldarelli', 'wishlist-images/book (19).jpg', 
'Analyze interconnected systems like social networks and transportation grids using graph-based algorithms.', 
NULL, 0),

('Kali Linux', 'sean-philip', 'wishlist-images/book (1).jpg', 
'Comprehensive guide to ethical hacking, penetration testing, and cybersecurity toolkits in Kali Linux.', 
NULL, 0),

('Computer Architecture', 'Unknown', 'wishlist-images/book (2).jpg', 
'Fundamentals of computer hardware design, instruction sets, and performance optimization for engineers.', 
NULL, 0);
select * from books;