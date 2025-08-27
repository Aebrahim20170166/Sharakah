$(document).ready(function () {
    $("#sections-carousel").owlCarousel({
        rtl: true,
        loop: true,
        margin: 24,
        nav: true,
        navClass: ["owl-prev", "owl-next"],
        dots: false,
        navText: [
            `<span class="owl-nav-custom"><svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M44 14.608C44 2.57831 41.4217 0 29.392 0H14.608C2.57831 0 0 2.57831 0 14.608V29.392C0 41.4217 2.57831 44 14.608 44H29.392C41.4217 44 44 41.4217 44 29.392V14.608Z" fill="#299FDA"/>
<path d="M27.7206 22.4386L22.5001 28.3644L17.225 28.2084L22.2553 22.4386L17.225 16.6689L22.5 16.5129L27.7206 22.4386Z" fill="white"/>
</svg>
</span>`,
            `<span class="owl-nav-custom"><svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0 14.608C0 2.57831 2.57831 0 14.608 0H29.392C41.4217 0 44 2.57831 44 14.608V29.392C44 41.4217 41.4217 44 29.392 44H14.608C2.57831 44 0 41.4217 0 29.392V14.608Z" fill="#299FDA"/>
<path d="M16.2794 22.4386L21.5 28.3644L26.775 28.2084L21.7447 22.4386L26.775 16.6689L21.5 16.5129L16.2794 22.4386Z" fill="white"/>
</svg>
</span>`,
        ],
        responsive: {
            0: { items: 1 },
            600: { items: 2 },
            900: { items: 3 },
            1200: { items: 5 }
        }
    });

    $("#opportunitiesCarousel").owlCarousel({
        rtl: true,
        loop: true,
        margin: 18,
        nav: true,
        dots: false,
        navText: [
            `<span class="owl-nav-custom"><svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0 14.608C0 2.57831 2.57831 0 14.608 0H29.392C41.4217 0 44 2.57831 44 14.608V29.392C44 41.4217 41.4217 44 29.392 44H14.608C2.57831 44 0 41.4217 0 29.392V14.608Z" fill="#299FDA"/>
<path d="M16.2794 22.4386L21.5 28.3644L26.775 28.2084L21.7447 22.4386L26.775 16.6689L21.5 16.5129L16.2794 22.4386Z" fill="white"/>
</svg>
</span>`,
            `<span class="owl-nav-custom"><svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M44 14.608C44 2.57831 41.4217 0 29.392 0H14.608C2.57831 0 0 2.57831 0 14.608V29.392C0 41.4217 2.57831 44 14.608 44H29.392C41.4217 44 44 41.4217 44 29.392V14.608Z" fill="#299FDA"/>
<path d="M27.7206 22.4386L22.5001 28.3644L17.225 28.2084L22.2553 22.4386L17.225 16.6689L22.5 16.5129L27.7206 22.4386Z" fill="white"/>
</svg>
</span>`,
        ],
        responsive: {
            0: { items: 1 },
            600: { items: 2 },
            900: { items: 3 },
            1200: { items: 3 }
        }
    });

    $("#opportunitiesCarousel1").owlCarousel({
        rtl: true,
        loop: true,
        margin: 18,
        nav: false,
        dots: false,
        responsive: {
            0: { items: 1 },
            600: { items: 2 },
            900: { items: 3 },
            1200: { items: 3 }
        }
    });

    // Custom arrows
    $('#riyadhPrev').click(function () {
        $("#opportunitiesCarousel1").trigger('prev.owl.carousel');
    });
    $('#riyadhNext').click(function () {
        $("#opportunitiesCarousel1").trigger('next.owl.carousel');
    });
});

// Arrow SVG
const arrowSVG = `<span class="active-arrow" style="display:flex;align-items:center;margin-right:4px;">
    <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M6.50003 11.2654L12.4258 6.04485L12.2698 0.769831L6.50003 5.80014L0.73025 0.769829L0.57425 6.04483L6.50003 11.2654Z" fill="#299FDA"/>
    </svg>
  </span>`;

// Get current page filename
const page = location.pathname.split('/').pop();

const pageMap = {
    '': '/',
    '/': '/',
    'about': '/about',
    'investmentOpportunities.html': 'investmentOpportunities.html',
    'contact.html': 'contact.html'
};

// Highlight active nav link
document.querySelectorAll('.navbar-nav .nav-link').forEach(function (link) {
    link.classList.remove('active');
    let arrow = link.querySelector('.active-arrow');
    if (arrow) arrow.remove();

    let href = link.getAttribute('href');
    if (href === pageMap[page]) {
        link.classList.add('active');
        link.insertAdjacentHTML('beforeend', arrowSVG);
    }
});
