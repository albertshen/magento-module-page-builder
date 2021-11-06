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
      var fileRegExp = new RegExp("^(webm:|mp4:|ogv:)");

      if (fileRegExp.test(value)) {
        return value.substr(fileRegExp.exec(value)[0].length);
      } else {
        return value;
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
      // var contentType = (0, _object.get)(data, 'name');

      if (videoType === 'link') {

        var value = (0, _object.get)(data, name);

        var youtubeRegExp = new RegExp("^(?:https?:\/\/|\/\/)?(?:www\\.|m\\.)?" + "(?:youtu\\.be\/|youtube\\.com\/(?:embed\/|v\/|watch\\?v=|watch\\?.+&v=))([\\w-]{11})(?![\\w-])");
        var vimeoRegExp = new RegExp("https?:\/\/(?:www\\.|player\\.)?vimeo.com\/(?:channels\/" + "(?:\\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\\d+)\/video\/|video\/|)(\\d+)(?:$|\/|\\?)");
        var fileRegExp = new RegExp("^(?:https:|http:)?\\/\\/.*[\\\\\\/].+\\.(webm|mp4|ogv)(?!\w)");
        var value = (0, _object.get)(data, 'video_source');
        if (youtubeRegExp.test(value)) {
          return "https://www.youtube.com/embed/" + youtubeRegExp.exec(value)[1];
        } else if (vimeoRegExp.test(value)) {
          return "https://player.vimeo.com/video/" + vimeoRegExp.exec(value)[3] + "?title=0&byline=0&portrait=0";
        } else if (fileRegExp.test(value)) {
          var result = fileRegExp.exec(value);
          return result[1] + ":" + value;
        }
      }

      if (videoType === 'uploader') {

        var value = (0, _object.get)(data, 'video_source_upload');

        if (value && typeof value[0] == "object") {
          var videoUrl = value[0].url;
          var mediaUrl = (0, _url.convertUrlToPathIfOtherUrlIsOnlyAPath)(_config.getConfig("media_url"), videoUrl);
          var mediaPath = videoUrl.split(mediaUrl);
          var type = value[0].type.split('/');
          return type[1] + ":{{media url=" + mediaPath[1] + "}}";
        }
        return "";
      }

    };

    return Src;
  }();

  return Src;
});
//# sourceMappingURL=src.js.map