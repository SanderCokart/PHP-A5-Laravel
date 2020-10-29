import Pickr from '@simonwep/pickr';

import '@simonwep/pickr/dist/themes/classic.min.css';


// Simple example, see optional options for more configuration.
const BACKGROUND_COLOR_PICKER = Pickr.create({
    el: '.background-color-picker',
    theme: 'classic', // or 'monolith', or 'nano'
    default: '#333333',

    components: {
        // Main components
        preview: true,
        opacity: true,
        hue: true,

        // Input / output Options
        interaction: {
            hex: true,
            input: true,
            clear: true,
            save: true,
            cancel: true,
        }
    }
});

BACKGROUND_COLOR_PICKER.on('save', instance => {
    if (instance !== null) {
        $('#bg_color').val(instance.toHEXA().toString(0));
        BACKGROUND_COLOR_PICKER.hide();
    }
}).on('init', instance => {
    BACKGROUND_COLOR_PICKER.setColor($('#bg_color').val());
}).on('clear', () => {
    $('#bg_color').val('');
});

// Simple example, see optional options for more configuration.
const TEXT_COLOR_PICKER = Pickr.create({
    el: '.text-color-picker',
    theme: 'classic', // or 'monolith', or 'nano'
    default: '#EEEEEE',

    components: {
        // Main components
        preview: true,
        opacity: true,
        hue: true,

        // Input / output Options
        interaction: {
            hex: true,
            input: true,
            clear: true,
            save: true,
            cancel: true,
        }
    }
});

TEXT_COLOR_PICKER.on('save', instance => {
    if (instance !== null) {
        $('#text_color').val(instance.toHEXA().toString(0));
        TEXT_COLOR_PICKER.hide();
    }
}).on('init', instance => {
    TEXT_COLOR_PICKER.setColor($('#text_color').val());
}).on('clear', () => {
    $('#text_color').val('');
});
