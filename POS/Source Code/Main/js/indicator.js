function setActive(index){
    const indicator = document.querySelectorAll('.indicator');
    const links = document.querySelectorAll('.sideNav a');

    links.forEach((link, i) => {
        if (i === index){
            link.classList.add('active');
            indicator.style.top = '${links.offsetTop}px';
        }
        else{
            link.classList.remove('active');
        }
    });
}