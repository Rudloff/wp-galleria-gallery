/*global Galleria, jQuery*/
/*jslint browser: true*/
var galleriaGallery = (function () {
    'use strict';
    return {
        init: function init() {
            if (jQuery('.gallery').length > 0) {
                Galleria.run('.gallery', {
                    height: 0.5625
                });
            }
        }
    };
}());
jQuery(document).ready(galleriaGallery.init);
