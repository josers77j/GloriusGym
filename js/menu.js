
const currentLocation = location.href;
const menuItems = document.querySelectorAll('a');
const menuLength = menuItems.length;
for (let i = 0; i < menuLength; i++) {
    if (menuItems[i].href === currentLocation) {
        menuItems[i].classList.add('text-light');
    }
}

const navLinks = document.querySelectorAll('.nav-link');
navLinks.forEach(navLink => {
  navLink.addEventListener('mouseover', () => {
    navLink.classList.add('text-white', 'fw-bold');
  });
  navLink.addEventListener('mouseout', () => {
    navLink.classList.remove('text-white', 'fw-bold');
  });
});