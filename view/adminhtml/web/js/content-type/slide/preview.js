/*eslint-disable */
/* jscs:disable */
function _inheritsLoose(subClass, superClass) { subClass.prototype = Object.create(superClass.prototype); subClass.prototype.constructor = subClass; _setPrototypeOf(subClass, superClass); }

define(["Magento_PageBuilder/js/content-type/slide/preview"], function (_preview) {
  /**
   * Copyright © Magento, Inc. All rights reserved.
   * See COPYING.txt for license details.
   */

  /**
   * @api
   */
  var Preview = /*#__PURE__*/function (_preview2) {
    "use strict";

    _inheritsLoose(Preview, _preview2);

    function Preview() {
      var _this;

      for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
        args[_key] = arguments[_key];
      }
      
      _this = _preview2.call.apply(_preview2, [this].concat(args)) || this;
      _this.videoUpdateProperties = ["background_type", "video_fallback_image", "video_lazy_load", "video_loop", "video_play_only_visible", "video_source", "video_source_upload", "video_type"];
      return _this;
    }

    return Preview;
  }(_preview);

  return Preview;
});
//# sourceMappingURL=preview.js.map