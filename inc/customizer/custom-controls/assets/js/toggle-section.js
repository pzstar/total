/* Keeps each home section's eye icon in the section list in step with its Enable Section switch. */
(function ($, api) {
    function updateSection(section, value) {
        var hidden = 'on' === value;

        section.headContainer.find('.accordion-section-title')
            .toggleClass('ht--section-hidden', hidden)
            .toggleClass('ht--section-visible', !hidden);

        section.headContainer.find('.ht--toggle-section .dashicons')
            .attr('class', 'dashicons ' + (hidden ? 'dashicons-hidden' : 'dashicons-visibility'));
    }

    // Follow the setting itself, so the icon is right however the value changes.
    api.bind('ready', function () {
        api.section.each(function (section) {
            var hidingControl = section.params.hiding_control;

            if (!hidingControl) {
                return;
            }

            api(hidingControl, function (setting) {
                updateSection(section, setting.get());
                setting.bind(function (value) {
                    updateSection(section, value);
                });
            });
        });
    });
})(jQuery, wp.customize);
