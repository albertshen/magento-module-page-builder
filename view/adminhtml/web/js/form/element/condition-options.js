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

        /** @inheritdoc */
        onUpdate: function (value) {

        	var videoUploader = uiRegistry.get('index = video_source_upload');
        	var videoLink = uiRegistry.get('index = video_source');
        	var videoType = uiRegistry.get('index = video_type');

        	if (value === 'image') {
	        	videoUploader.hide();
	            videoLink.hide();	
        	}
        	if (value === 'video') {
        		if (videoType.value() === 'link') {
        			videoLink.show()
        		}
        		if (videoType.value() === 'uploader') {
        			videoUploader.show()
        		}
        	}
            this.showRelatedElement(value);

            return this._super();
        }

    });
});
