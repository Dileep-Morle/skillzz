
  (function () {
    if (typeof window.history.pushState === 'function') {
      window.history.pushState(null, '', window.location.href);
      window.onpopstate = function () {
        window.history.pushState(null, '', window.location.href);
        winbdow.history.back(1);
      };
    }
  })();
		 
