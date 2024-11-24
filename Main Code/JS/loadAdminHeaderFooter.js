fetch('adminNavbar.html').then(res=> res.text()).then(data => {
    document.getElementById('admin_nav').innerHTML = data;
}).catch(error => console.error('Error loading Navbar:', error));

fetch('Admin_Foot.html').then(res=> res.text()).then(data => {
    document.getElementById('admin_footer').innerHTML = data;
}).catch(error => console.error('Error loading Footer:', error));