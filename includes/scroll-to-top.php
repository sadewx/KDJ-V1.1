<?php
// scroll-to-top.php
?>

<!-- Scroll to Top Button -->
<div id="scrollToTop" class="scroll-to-top">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
  </svg>
</div>



<!-- Embedded CSS -->
<style>
  /* Scroll to Top Button */
  .scroll-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 60px;
    height: 60px;
    background-color:rgb(239, 68, 68);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
  }

  .scroll-to-top.show {
    opacity: 1;
    visibility: visible;
  }

  /* Popup */
  .popup {
    position: fixed;
    bottom: 80px;
    right: 20px;
    background-color: #ffffff;
    padding: 15px 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
    z-index: 999;
  }

  .popup.show {
    opacity: 1;
    visibility: visible;
  }
</style>

<!-- Embedded JavaScript -->
<script>
  // JavaScript for Scroll to Top and Auto Popup
  const scrollToTopBtn = document.getElementById('scrollToTop');
  const scrollPopup = document.getElementById('scrollPopup');

  // Show or hide the Scroll to Top button and Popup based on scroll position
  window.addEventListener('scroll', () => {
    if (window.scrollY > 300) { // Show button and popup after scrolling 300px
      scrollToTopBtn.classList.add('show');
      scrollPopup.classList.add('show');
    } else {
      scrollToTopBtn.classList.remove('show');
      scrollPopup.classList.remove('show');
    }
  });

  // Scroll to Top functionality
  scrollToTopBtn.addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  // Optional: Hide the popup after a few seconds
  setTimeout(() => {
    scrollPopup.classList.remove('show');
  }, 5000); // Hide popup after 5 seconds
</script>