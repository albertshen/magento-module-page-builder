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
      }

      if (videoType === 'uploader') {
        var value = (0, _object.get)(data, name);
        if (name === 'video_source') {
          value = (0, _object.get)(data, 'video_source_upload');
        }
        if (value && typeof value[0] == "object") {
          return value = value[0].url;;
        }
        return "";
      }

      var youtubeRegExp = new RegExp("^(?:https?:\/\/|\/\/)?(?:www\\.|m\\.)?" + "(?:youtu\\.be\/|youtube\\.com\/(?:embed\/|v\/|watch\\?v=|watch\\?.+&v=))([\\w-]{11})(?![\\w-])");
      var vimeoRegExp = new RegExp("https?:\/\/(?:www\\.|player\\.)?vimeo.com\/(?:channels\/" + "(?:\\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\\d+)\/video\/|video\/|)(\\d+)(?:$|\/|\\?)");

      if (youtubeRegExp.test(value)) {
        return "https://www.youtube.com/embed/" + youtubeRegExp.exec(value)[1] + (data.autoplay === "true" ? "?autoplay=1&mute=1" : "");
      } else if (vimeoRegExp.test(value)) {
        return "https://player.vimeo.com/video/" + vimeoRegExp.exec(value)[3] + "?title=0&byline=0&portrait=0" + (data.autoplay === "true" ? "&autoplay=1&autopause=0&muted=1" : "");
      }

      return value;

    };


    return VideoSrc;
  }();

  return VideoSrc;
});
//# sourceMappingURL=videosrc.js.map