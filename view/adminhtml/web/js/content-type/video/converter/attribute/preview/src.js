/*eslint-disable */
/* jscs:disable */
define(["Magento_PageBuilder/js/utils/object"], function (_object) {
  /**
   * Copyright © Magento, Inc. All rights reserved.
   * See COPYING.txt for license details.
   */
  var VideoSrc = /*#__PURE__*/function () {
    "use strict";

    function VideoSrc() {}

    var _proto = VideoSrc.prototype;

    /**
     * Convert value to internal format
     *
     * @param value string
     * @returns {string | object}
     */
    _proto.fromDom = function fromDom(value) {
      if (!value) {
        return "";
      }

      return value;
    }
    /**
     * Convert value to knockout format
     *
     * @param {string} name
     * @param {DataObject} data
     * @returns {string}
     */
    ;

    _proto.toDom = function toDom(name, data) {

      var videoType = (0, _object.get)(data, 'video_type');
      var contentType = (0, _object.get)(data, 'name');

      if (videoType === 'link') {
        var value = (0, _object.get)(data, name);
        if (name === 'video_source_upload') {
          value = (0, _object.get)(data, 'video_source');
        }

        return "mp4:"+value;
      }

      if (videoType === 'uploader') {
        var value = (0, _object.get)(data, name);
        if (name === 'video_source') {
          value = (0, _object.get)(data, 'video_source_upload');
        }
        
        if (value && typeof value[0] == "object") {
          var type = value[0].type.split('/');
          return type[1] + ':' + value[0].url;
        }
        return "";
      }

    };


    return VideoSrc;
  }();

  return VideoSrc;
});
//# sourceMappingURL=videosrc.js.map