(function(){
  const STORAGE_KEYS = {
    theme: 'pp_theme',
    dir: 'pp_dir',
    filters: 'pp_filters'
  };

  // Apply saved preferences
  const savedTheme = localStorage.getItem(STORAGE_KEYS.theme) || 'light';
  document.documentElement.setAttribute('data-theme', savedTheme === 'dark' ? 'dark' : 'light');
  const savedDir = localStorage.getItem(STORAGE_KEYS.dir) || 'rtl';
  document.documentElement.setAttribute('dir', savedDir);

  // Theme toggle
  const themeBtn = document.getElementById('themeToggle');
  if(themeBtn){
    themeBtn.addEventListener('click', function(e){
      e.preventDefault();
      const current = document.documentElement.getAttribute('data-theme') === 'dark' ? 'dark' : 'light';
      const next = current === 'dark' ? 'light' : 'dark';
      document.documentElement.setAttribute('data-theme', next);
      localStorage.setItem(STORAGE_KEYS.theme, next);
    });
  }

  // Dir toggle
  const dirBtn = document.getElementById('dirToggle');
  if(dirBtn){
    dirBtn.addEventListener('click', function(e){
      e.preventDefault();
      const current = document.documentElement.getAttribute('dir') || 'rtl';
      const next = current.toLowerCase() === 'rtl' ? 'ltr' : 'rtl';
      document.documentElement.setAttribute('dir', next);
      localStorage.setItem(STORAGE_KEYS.dir, next);
    });
  }

  // Filters (only on opportunities page)
  const cityEl = document.getElementById('cityFilter');
  const sectorEl = document.getElementById('sectorFilter');
  const minEl = document.getElementById('minFilter');
  const statusEl = document.getElementById('statusFilter');
  const applyBtn = document.getElementById('applyFilters');
  const resetBtn = document.getElementById('resetFilters');

  function restoreFilters(){
    try{
      const saved = JSON.parse(localStorage.getItem(STORAGE_KEYS.filters) || '{}');
      if(cityEl && saved.city) cityEl.value = saved.city;
      if(sectorEl && saved.sector) sectorEl.value = saved.sector;
      if(minEl && saved.min) minEl.value = saved.min;
      if(statusEl && saved.status) statusEl.value = saved.status;
    }catch(e){}
  }

  function saveFilters(){
    const data = {
      city: cityEl ? cityEl.value : '',
      sector: sectorEl ? sectorEl.value : '',
      min: minEl ? minEl.value : '',
      status: statusEl ? statusEl.value : ''
    };
    localStorage.setItem(STORAGE_KEYS.filters, JSON.stringify(data));
  }

  function applyFilters(){
    const cards = document.querySelectorAll('.grid .card[data-city]');
    const city = cityEl ? cityEl.value : '';
    const sector = sectorEl ? sectorEl.value : '';
    const min = minEl ? parseInt(minEl.value || '0', 10) : 0;
    const status = statusEl ? statusEl.value : '';

    cards.forEach(card => {
      const c = card.getAttribute('data-city') || '';
      const s = card.getAttribute('data-sector') || '';
      const m = parseInt(card.getAttribute('data-min') || '0', 10);
      const st = card.getAttribute('data-status') || '';

      let show = true;
      if(city && c !== city) show = false;
      if(sector && s !== sector) show = false;
      if(min && !(m <= min)) show = false;
      if(status && st !== status) show = false;

      card.style.display = show ? '' : 'none';
    });
  }

  if(cityEl && sectorEl && minEl && statusEl){
    restoreFilters();
    applyFilters();
    if(applyBtn) applyBtn.addEventListener('click', function(e){ e.preventDefault(); saveFilters(); applyFilters(); });
    if(resetBtn) resetBtn.addEventListener('click', function(e){
      e.preventDefault();
      cityEl.value = '';
      sectorEl.value = '';
      minEl.value = '';
      statusEl.value = '';
      saveFilters();
      applyFilters();
    });
  }
})();