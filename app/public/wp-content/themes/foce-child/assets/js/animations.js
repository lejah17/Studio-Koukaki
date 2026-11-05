console.log("animations.js chargé");

document.addEventListener("DOMContentLoaded", () => {
    // effet fade-in sur les sections //
    // au chargement de la page, sections.forEach parcourt un tableau regroupant toutes les sections fade-in, de position "index"
    const sections = document.querySelectorAll('.fade-section');
    sections.forEach((section, index) => {
        setTimeout(() => {
            section.classList.add('appearing'); 
        }, index * 200); // apparition l'une après l'autre
    });

    // effet lettre par lettre sur les titres //
    const titles = document.querySelectorAll(".section-title");
   // on découpe chaque titre en lettres
    titles.forEach(title => {
        const text = title.textContent.trim();
        title.textContent = "";
        text.split("").forEach((char, i) => { 
            const span = document.createElement("span"); // chaque lettre se retrouve dans une span
            span.textContent = char;
            span.classList.add("letter");
            span.style.transitionDelay = `${i * 40}ms`; // chaque span de position i apparaît avec un délai progressif
            title.appendChild(span);
        });
    });

    // observateur pour gérer l'apparition de tous les titres et lettres
    //InterSectionObserver prévient quand les titres apparaissent dans la zone visible, ils sont stockés dans la liste "entries".
    const titleObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) { // "est visible dans la zone en cours"
                entry.target.classList.add("appearing"); 
            }
        });
    }, { threshold: 0.1 });

    titles.forEach(title => titleObserver.observe(title)); // l'observeur surveille quand le titre apparaît dans le viewport et lance l'animation
});


// effet parallaxe du logo de la banner //
// On écoute au scroll le nombre de pixels parcourus verticalement depuis le haut de la page
document.addEventListener("scroll", () => {
    const logo = document.querySelector(".banner-logo");
    if (logo) {
        const scrollY = window.scrollY;
        const maxOffset = 160; // limite verticale du logo
        const ratio = Math.min(scrollY / 600, 1); // progression limitée
        logo.style.transform = `translateY(${maxOffset * ratio}px)`; // descend au scroll
    }
});


// carrousel (Swiper) //
const carrousel = new Swiper('.carrousel', {
    slidesOffsetAfter: 30,
    slidesPerView: 4,
    spaceBetween: 30,
    centeredSlides: false,
    loop: false,
    slidesOffsetBefore: 600 // aligné avec le titre
});


// effet parallaxe des nuages //
const place = document.querySelector("#place");
const bigCloud = document.querySelector(".big-cloud");
const littleCloud = document.querySelector(".little-cloud");

function updateClouds() {
    if (!place || !bigCloud || !littleCloud) return;

    // désactivation sur mobile
    if (window.innerWidth < 768) {
        bigCloud.style.transform = "none";
        littleCloud.style.transform = "none";
        return;
    }

    // comportement desktop
    const rect = place.getBoundingClientRect();
    const progress = Math.min(Math.max((window.innerHeight - rect.top) / window.innerHeight, 0), 1);
    const sectionWidth = place.offsetWidth;

    const bigMaxOffset = sectionWidth * 0.8 - 600;
    const littleMaxOffset = sectionWidth * 0.65 - 300;

    // Math.min(..., 300) : déplacement à 300px maximum
    const bigCloudMove = Math.min(progress * bigMaxOffset, 300);
    const littleCloudMove = Math.min(progress * littleMaxOffset, 300);

    bigCloud.style.transform = `translateX(${-bigCloudMove}px)`;
    littleCloud.style.transform = `translateX(${-littleCloudMove}px)`;
}

window.addEventListener("scroll", () => requestAnimationFrame(updateClouds));
window.addEventListener("resize", updateClouds);
updateClouds();

// bouton du menu burger //
const burger = document.querySelector(".menu-toggle");
const nav = document.querySelector("#site-navigation");

if (burger && nav) {
    burger.addEventListener("click", () => {
        nav.classList.toggle("open");
    });

    const menuLinks = document.querySelectorAll("#site-navigation a[href^='#']");
    
    menuLinks.forEach(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault(); // bloque le saut instantané

            const targetId = link.getAttribute("href");
            const targetSection = document.querySelector(targetId);

            // ferme le menu
            nav.classList.remove("open");

            // attente de 300ms pour que le menu ait fini de disparaître et calcul de la hauteur de page
            setTimeout(() => {
                if (targetSection) {
                    const headerHeight = 80; // hauteur fixe de la barre de navigation orange (80px)
                    const targetPosition = targetSection.getBoundingClientRect().top + window.pageYOffset - headerHeight;

                    window.scrollTo({
                        top: targetPosition,
                    });
                }
            }, 300); // // 300ms de délai pour laisser le menu se replier proprement
        });
    });
}