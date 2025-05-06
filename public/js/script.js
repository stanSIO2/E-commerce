const galleryTrack = document.querySelector('#galerie .carousel-track');
    const galleryPrev = document.getElementById('prev-gallery');
    const galleryNext = document.getElementById('next-gallery');

    const veilleTrack = document.querySelector('#veille .carousel-track');
    const veillePrev = document.getElementById('prev-veille');
    const veilleNext = document.getElementById('next-veille');

    let galleryIndex = 0;
    let veilleIndex = 0;

    galleryPrev.addEventListener('click', () => {
        galleryIndex = Math.max(galleryIndex - 1, 0);
        galleryTrack.style.transform = `translateX(-${galleryIndex * 33.333}%)`;
    });

    galleryNext.addEventListener('click', () => {
        galleryIndex = Math.min(galleryIndex + 1, galleryTrack.children.length - 3);
        galleryTrack.style.transform = `translateX(-${galleryIndex * 33.333}%)`;
    });

    veillePrev.addEventListener('click', () => {
        veilleIndex = Math.max(veilleIndex - 1, 0);
        veilleTrack.style.transform = `translateX(-${veilleIndex * 33.333}%)`;
    });

    veilleNext.addEventListener('click', () => {
        veilleIndex = Math.min(veilleIndex + 1, veilleTrack.children.length - 3);
        veilleTrack.style.transform = `translateX(-${veilleIndex * 33.333}%)`;
    });