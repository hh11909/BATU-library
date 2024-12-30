const _API = 'http://127.0.0.1:8080';
const El = function (tagName, attrs, children) {
    const el = document.createElement(tagName);
    if (attrs && Object.keys(attrs).length > 0) {
        for (let [k, v] of Object.entries(attrs)) {
            if (typeof v === 'function') {
                el.addEventListener(k.slice(2).toLowerCase(), v);
            }
            else {
                el.setAttribute(k, v);
            }
        }
    }
    if (children) {
        if (Array.isArray(children)) {
            for (let child of children)
                el.append(child);
        }
        else {
            el.append(children);
        }
    }
    return el;
};
const getValueById = (id) => {
    let value = document.getElementById(id).value;
    if (value) {
        return value.trim();
    }
    return null;
};
// Register Form Submit Function
const registerUser = async (e) => {
    e.preventDefault();
    const firstName = getValueById('firstName');
    const lastName = getValueById('lastName');
    const email = getValueById('registerEmail');
    const pass = getValueById('registerPassword');
    const confirmPass = getValueById('registerConfirmPassword');
    const birthdate = getValueById('birthdate');
    const studentId = getValueById('studentId');
    const fullName = `${firstName} ${lastName}`;
    const wantToBeAFriend = getValueById('libraryFriend');
    let gender = document.querySelector('input[name="gender"]:checked')?.value;
    if (email && pass && confirmPass && fullName && studentId && gender) {
        if (pass === confirmPass) {
            document.cookie += `&newFriend=${wantToBeAFriend}&studentId=${studentId}`;
            try {
                const res = await fetch(`${_API}/api/signup`, {
                    method: 'POST',
                    mode: 'same-origin',
                    body: JSON.stringify({
                        fullName,
                        email,
                        password: pass,
                        studentId,
                        birthdate,
                        gender
                    })
                });
                const { status, } = res;
                if (status >= 500) {
                    console.log(status, 'Internal Error');
                }
                else if (status >= 400) {
                    switch (status) {
                        case 400: {
                            console.error(status, 'Bad Request');
                        }
                        default: {
                            console.error(status, 'Error');
                        }
                    }
                }
                else if (status > 200) {
                    console.log(status, 'Success');
                }
            }
            catch (e) {
                console.log('SUCCESS IN FORM VALUES');
            }
        }
    }
};
// Login Form Submit Function
const loginSubmit = async (e) => {
    e.preventDefault();
    const email = getValueById('email');
    const pass = getValueById('password');
    if (email && pass) {
        console.log(email, pass);
        const res = await fetch(`${_API}/api/login`, {
            method: 'POST',
            mode: 'same-origin',
            body: JSON.stringify({
                email: email,
                password: pass
            })
        });
        const { status, } = res;
        if (status >= 500) {
            console.log(status, 'Internal Error');
        }
        else if (status >= 400) {
            switch (status) {
                case 400: {
                    console.error(status, 'Bad Request');
                }
                case 401: {
                    console.error(status, 'Unauthorized');
                }
                case 404: {
                    console.error(status, 'Not Found');
                }
                default: {
                    console.error(status, 'Error');
                }
            }
        }
        else if (status > 200) {
            console.log(status, 'Success');
        }
    }
};
let paths = location.pathname.split('/');
switch (paths[paths.length - 1]) {
    case 'register1.html': {
        document.getElementById('registerForm')
            .addEventListener('submit', registerUser);
    }
    case "login.html": {
        document.getElementById('loginForm')
            .addEventListener('submit', loginSubmit);
    }
    case 'index.html': {
        // console.log('ss')
    }
}
// DATABASE
const BOOKS = [
    {
        id: '1001',
        name: 'Python Programming for Biology',
        description: '',
        authorId: '3000',
        category: {
            id: '2000',
            name: 'Programming',
            genre: 'Biology'
        },
        images: ['wishlist-images/book1.jpg'],
        isBorrowed: false
    },
    {
        id: '1002',
        name: 'Data Visualization',
        description: '',
        authorId: '3001',
        category: {
            id: '2001',
            name: 'Data Science',
            genre: 'Visualization'
        },
        images: ['wishlist-images/book2.jpg'],
        isBorrowed: false
    },
    {
        id: '1003',
        name: 'Algorithms to Live By',
        description: '',
        authorId: '3002',
        category: {
            id: '2002',
            name: 'Algorithms',
            genre: 'Practical'
        },
        images: ['wishlist-images/book3.jpg'],
        isBorrowed: false
    },
    {
        id: '1004',
        name: 'Human Compatible',
        description: '',
        authorId: '3003',
        category: {
            id: '2003',
            name: 'Artificial Intelligence',
            genre: 'Ethics'
        },
        images: ['wishlist-images/book5.jpg'],
        isBorrowed: false
    },
    {
        id: '1005',
        name: 'Design for How People Think',
        description: '',
        authorId: '3004',
        category: {
            id: '2004',
            name: 'Design',
            genre: 'UX'
        },
        images: ['wishlist-images/book4.jpg'],
        isBorrowed: false
    },
    {
        id: '1006',
        name: 'Artificial Intelligence Accelerated human learning',
        description: '',
        authorId: '3005',
        category: {
            id: '2005',
            name: 'Artificial Intelligence',
            genre: 'Learning'
        },
        images: ['wishlist-images/book (7).jpg'],
        isBorrowed: false
    },
    {
        id: '1007',
        name: 'Algorithms for Image Processing and Computer Vision',
        description: '',
        authorId: '3006',
        category: {
            id: '2006',
            name: 'Computer Vision',
            genre: 'Image Processing'
        },
        images: ['wishlist-images/book (8).jpg'],
        isBorrowed: false
    },
    {
        id: '1008',
        name: 'Intro to Python',
        description: '',
        authorId: '3007',
        category: {
            id: '2007',
            name: 'Programming',
            genre: 'Python'
        },
        images: ['wishlist-images/book (9).jpg'],
        isBorrowed: false
    },
    {
        id: '1009',
        name: 'Python for Excel',
        description: '',
        authorId: '3008',
        category: {
            id: '2008',
            name: 'Programming',
            genre: 'Data Analysis'
        },
        images: ['wishlist-images/book (10).jpg'],
        isBorrowed: false
    },
    {
        id: '1010',
        name: 'Computation for Neuroscience',
        description: '',
        authorId: '3009',
        category: {
            id: '2009',
            name: 'Neuroscience',
            genre: 'Computation'
        },
        images: ['wishlist-images/book (11).jpg'],
        isBorrowed: false
    },
    {
        id: '1011',
        name: 'Quantum Computing for Computer Scientists',
        description: '',
        authorId: '3010',
        category: {
            id: '2010',
            name: 'Quantum Computing',
            genre: 'Introduction'
        },
        images: ['wishlist-images/book (12).jpg'],
        isBorrowed: false
    },
    {
        id: '1012',
        name: 'High Performance Python',
        description: '',
        authorId: '3011',
        category: {
            id: '2011',
            name: 'Programming',
            genre: 'Optimization'
        },
        images: ['wishlist-images/book (13).jpg'],
        isBorrowed: false
    },
    {
        id: '1013',
        name: 'Foundations of Computer Vision',
        description: '',
        authorId: '3012',
        category: {
            id: '2012',
            name: 'Computer Vision',
            genre: 'Theory'
        },
        images: ['wishlist-images/book (14).jpg'],
        isBorrowed: false
    },
    {
        id: '1014',
        name: 'Algorithmic Intelligence',
        description: '',
        authorId: '3013',
        category: {
            id: '2013',
            name: 'Algorithms',
            genre: 'Intelligence'
        },
        images: ['wishlist-images/book (15).jpg'],
        isBorrowed: false
    },
    {
        id: '1015',
        name: 'Hands-on Machine Learning with Scikit-Learn Keras & Tensorflow',
        description: '',
        authorId: '3014',
        category: {
            id: '2014',
            name: 'Machine Learning',
            genre: 'Practical'
        },
        images: ['wishlist-images/book (16).jpg'],
        isBorrowed: false
    },
    {
        id: '1016',
        name: 'Indexing It All',
        description: '',
        authorId: '3015',
        category: {
            id: '2015',
            name: 'Information Science',
            genre: 'Indexing'
        },
        images: ['wishlist-images/book (17).jpg'],
        isBorrowed: false
    },
    {
        id: '1017',
        name: 'Computational Homotopy',
        description: '',
        authorId: '3016',
        category: {
            id: '2016',
            name: 'Mathematics',
            genre: 'Topology'
        },
        images: ['wishlist-images/book (18).jpg'],
        isBorrowed: false
    },
    {
        id: '1018',
        name: 'Data Science & Complex Networks',
        description: '',
        authorId: '3017',
        category: {
            id: '2017',
            name: 'Data Science',
            genre: 'Networks'
        },
        images: ['wishlist-images/book (19).jpg'],
        isBorrowed: false
    },
    {
        id: '1019',
        name: 'Kali Linux',
        description: '',
        authorId: '3018',
        category: {
            id: '2018',
            name: 'Cybersecurity',
            genre: 'Tools'
        },
        images: ['wishlist-images/book (1).jpg'],
        isBorrowed: false
    },
    {
        id: '1020',
        name: 'Computer Architecture',
        description: '',
        authorId: '3019',
        category: {
            id: '2019',
            name: 'Computer Science',
            genre: 'Architecture'
        },
        images: ['wishlist-images/book (2).jpg'],
        isBorrowed: false
    }
];
const AUTHORS = [
    { id: '3000', name: 'Tim J. Stevens', books: ['1001'] },
    { id: '3001', name: 'Andy Kirk', books: ['1002'] },
    { id: '3002', name: 'Brian Christian', books: ['1003'] },
    { id: '3003', name: 'Stuart Russell', books: ['1004'] },
    { id: '3004', name: 'John Whalen', books: ['1005'] },
    { id: '3005', name: 'Katashi Nagao', books: ['1006'] },
    { id: '3006', name: 'J.R.Parker', books: ['1007'] },
    { id: '3007', name: 'Paul Deitel', books: ['1008'] },
    { id: '3008', name: 'Felix Zumstien', books: ['1009'] },
    { id: '3009', name: 'Paul Miller', books: ['1010'] },
    { id: '3010', name: 'Noson S.yanofsky', books: ['1011'] },
    { id: '3011', name: 'Micha Gorelick', books: ['1012'] },
    { id: '3012', name: 'James F.Peters', books: ['1013'] },
    { id: '3013', name: 'Stefan Edelkamp', books: ['1014'] },
    { id: '3014', name: 'Aurelien geron', books: ['1015'] },
    { id: '3015', name: 'Ronald E.Day', books: ['1016'] },
    { id: '3016', name: 'Graham Ellis', books: ['1017'] },
    { id: '3017', name: 'Guido Caldarelli', books: ['1018'] },
    { id: '3018', name: 'sean-philip', books: ['1019'] },
    { id: '3019', name: 'Unknown', books: ['1020'] }
];
