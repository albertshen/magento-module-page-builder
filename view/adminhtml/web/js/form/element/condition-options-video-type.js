/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'Magento_PageBuilder/js/form/element/condition-options',
    'uiRegistry'
], function (ConditionOptions, uiRegistry) {
    'use strict';

    return ConditionOptions.extend({

        /**
         * Sets exported property, linked with visibility of the element, defined as option
         *
         * @param {String} value
         * @returns {Object} Chainable
         */
        showRelatedElement: function (value) {
            if (uiRegistry.get('index = background_type').value() !== 'image') {
                this[value + 'Visible'](true);
            }
            this.options().forEach(function (option) {
                if (value !== option.value) {
                    this[option.value + 'Visible'](false);
                }
            }.bind(this));

            return this;
        }

    });
});
