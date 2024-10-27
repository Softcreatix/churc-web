// JavaScript to toggle the hamburger menu
document.addEventListener('DOMContentLoaded', function () {
    const menuIcon = document.querySelector('.menu-icon');
    const exitIcon = document.querySelector('.exit-icon');
    const listDetails = document.querySelector('.list-details');
    const ourMenu = document.querySelector('.our-menu');

    // Show the menu when the hamburger icon is clicked
    menuIcon.addEventListener('click', function () {
        listDetails.classList.add('active');  // Show the menu
        ourMenu.classList.add('active');      // Hide the menu icon and show the exit icon
    });

    // Hide the menu when the exit icon is clicked
    exitIcon.addEventListener('click', function () {
        listDetails.classList.remove('active');  // Hide the menu
        ourMenu.classList.remove('active');      // Show the menu icon and hide the exit icon
    });
});

// JavaScript to toggle the hamburger menu
document.addEventListener('DOMContentLoaded', function () {
    const menuIcon = document.querySelector('.menu-icon-admin');
    const exitIcon = document.querySelector('.exit-icon-admin');
    const navMenu = document.querySelector('.first-bloc nav');
    const adminMenu = document.querySelector('.admin-menu');

    // Show the menu when the hamburger icon is clicked
    menuIcon.addEventListener('click', function () {
        navMenu.classList.add('active');    // Show the menu
        adminMenu.classList.add('active');   // Hide menu icon, show exit icon
    });

    // Hide the menu when the exit icon is clicked
    exitIcon.addEventListener('click', function () {
        navMenu.classList.remove('active');  // Hide the menu
        adminMenu.classList.remove('active'); // Show menu icon, hide exit icon
    });
});



/**************************************
 #gallery
 ***************************************/
 document.addEventListener('DOMContentLoaded', function () {
     const galleryList = document.querySelectorAll('.gallery-list ul li');
     const galleryItem = document.querySelectorAll('.gallery-item');
 
     galleryList.forEach(item => {
         item.addEventListener('click', function () {
             galleryList.forEach(catItem => catItem.classList.remove('active'));
             this.classList.add('active');
             const filter = this.getAttribute('data-filter');
             galleryItem.forEach(category => {
                 if (category.classList.contains(filter)) {
                     category.style.display = 'flex';
                 } else {
                     category.style.display = 'none';
                 }
             });
         });
     });
 });

 
/*----------------------------------
#Image moving gallery
----------------------------------*/

document.querySelectorAll('.bi-chevron-left').forEach(leftArrow => {
    leftArrow.addEventListener('click', function () {
        const galleryImages = this.nextElementSibling;
        if (galleryImages && galleryImages.classList.contains('gallery-images')) {
            galleryImages.scrollBy({
                left: -300,
                behavior: 'smooth'
            });
        }
    });
});

document.querySelectorAll('.bi-chevron-right').forEach(rightArrow => {
    rightArrow.addEventListener('click', function () {
        const galleryImages = this.previousElementSibling;
        if (galleryImages && galleryImages.classList.contains('gallery-images')) {
            galleryImages.scrollBy({
                left: 300,
                behavior: 'smooth'
            });
        }
    });
});