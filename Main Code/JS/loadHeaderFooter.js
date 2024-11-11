fetch('Navbar.html').then(res=> res.text()).then(data => {
    document.getElementById('nav').innerHTML = data;
}).catch(error => console.error('Error loading Navbar:', error));

fetch('Footer.html').then(res=> res.text()).then(data => {
    document.getElementById('footer').innerHTML = data;
}).catch(error => console.error('Error loading Footer:', error));