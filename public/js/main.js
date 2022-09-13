//ハンバーガーメニューとドロワーメニュー
const target = document.getElementById("menu");
target.addEventListener('click', () => {
  target.classList.toggle('open');
  const guestNav = document.getElementById('guest_nav');
  guestNav.classList.toggle('in');
});

target.addEventListener('click', () => {
  target.classList.toggle('authOpen');
  const authNav = document.getElementById('auth_nav');
  authNav.classList.toggle('in');
});