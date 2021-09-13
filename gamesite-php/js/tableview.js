'use strict'

window.onload = () => {

    /*custom left-popup button in table view section*/
    const fillers = Array.from(document.getElementsByClassName('filler'));

    function showButton() {
        let btn = (this.querySelector('.btn-add-to-favorite'));

        if (btn) {
            $(btn).animate({ right: '0' });
            $(btn).clearQueue();
        }
    }

    function hideButton() {
        let btn = (this.querySelector('.btn-add-to-favorite'));

        if (btn) {
            $(btn).animate({ right: '100%' });
            $(btn).clearQueue();
        }
    }


    fillers.forEach((currVal) => {
        currVal.addEventListener('mouseenter', showButton);
        currVal.addEventListener('mouseleave', hideButton);
    });
}
