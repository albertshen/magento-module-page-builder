/*eslint-disable */
/* jscs:disable */
define(["Magento_PageBuilder/js/config", "AlbertMage_PageBuilder/js/utils/video", "Magento_PageBuilder/js/utils/object", "Magento_PageBuilder/js/utils/url"], function (_config, _video, _object, _url) {
  /**
   * Copyright © Magento, Inc. All rights reserved.
   * See COPYING.txt for license details.
   */

  /**
   * @api
   */
  var Src = /*#__PURE__*/function () {
    "use strict";

    function Src() {}

    var _proto = Src.prototype;

    /**
     * Convert value to internal format
     *
     * @param value string
     * @returns {string | object}
     */
    _proto.fromDom = function fromDom(value) {
      if(!value || (0, _video.isMedia)(value)) {
        return "";
      }
      value = value.replace(/\?autoplay=1&mute=1/g, "");
      value = value.replace(/\?title=0&byline=0&portrait=0/g, "");
      value = value.replace(/&autoplay=1&autopause=0&muted=1/g, "");
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

      if (videoType === 'link') {
        return "";
      }

      if (videoType === 'uploader') {

        var value = (0, _object.get)(data, 'video_source_upload');

        var videoUrl = value[0].url;
        var mediaUrl = (0, _url.convertUrlToPathIfOtherUrlIsOnlyAPath)(_config.getConfig("media_url"), videoUrl);
        var mediaPath = videoUrl.split(mediaUrl);
        return "{{media url=" + mediaPath[1] + "}}";
      }

    };

    return Src;
  }();

  return Src;
});
//# sourceMappingURL=src.js.map