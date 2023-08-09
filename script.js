function navigateToPage(url) {
 
    const currentUrl = window.location.href;
  
    history.pushState(null, null, url);
  
    history.replaceState(null, null, currentUrl);
  
  }