
const sections = document.querySelectorAll('.init-hidden');
const observerOptions = {
    threshold: [0, 0.5, 1], 
};

sections.forEach((section) => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.intersectionRatio >= 0.5) {
                
                section.classList.add('init-hidden-off');
                observer.unobserve(section);
            }
        });
    }, observerOptions);

    observer.observe(section);
});
