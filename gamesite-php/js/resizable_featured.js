const TABLEVIEW_ROW_HEIGHT = 240.0;
$(function() {
    function resizeFeatured() {
        const featured = document.querySelector('#featuredProjectsCarousel');

        if (featured) {
            let screenHeight = window.innerHeight;

            featured.style.height = (screenHeight - TABLEVIEW_ROW_HEIGHT) + 'px';
        }
    }

    resizeFeatured();
    window.onresize = resizeFeatured;
});