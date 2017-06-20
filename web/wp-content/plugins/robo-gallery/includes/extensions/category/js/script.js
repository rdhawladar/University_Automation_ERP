;(function ($, undefined){
    function AttributeMetaBox() {
        this.$element = $('#hierarchy-post-attributes-metabox');
        this.$edit = null;
        this.postId = null;
        this.postType = null;

        this.init();
    }
    AttributeMetaBox.prototype = {
        init: function () {
            var self = this;

            self.$edit = self.$element.find('button.edit');
            self.postId = self.$edit.data('post_id');
            self.postType = self.$edit.data('post_type');

            self.$edit.click(function() {
                return self.edit();
            });
        },
        edit: function () {
            var self = this;

            new DialogEdit({
                postType: this.postType,
                callbackSave: function() { self.update(); }
            });

            return false;
        },
        update: function () {
            var self = this;

            $.ajax({
                url: hierarchyPostAttributes.ajaxUrl,
                method: 'post',
                data: {
                    action: hierarchyPostAttributes.metaBox.action.get,
                    post_id: self.postId
                },
                success: function (response) {
                    self.$element.find('.inside').html(response);
                    self.init();
                },
                error: function (jqXHR) {
                    new DialogError(jqXHR.responseText);
                }
            });
        }
    };

    function DialogEdit(options) {
        this.postType = options.postType;
        this.callbackSave = options.callbackSave;
        this.$element = $('<div class="wrapper-nestable-list" />');
        this.$nestableList = null;

        this.init();
    }
    DialogEdit.prototype = {
        init: function() {
            var self = this;

            $.ajax({
                url: hierarchyPostAttributes.ajaxUrl,
                method: 'post',
                data: {
                    action: hierarchyPostAttributes.dialog.action.get,
                    post_type: self.postType
                },
                success: function (response) {
                    self.$element.html(response).appendTo("body");

                    self.$nestableList = self.$element.find('.nestable-list');
                    self.$nestableList.nestable({group: 1, maxDepth: 100});

                    self.show();
                },
                error: function (jqXHR) {
                    new DialogError(jqXHR.responseText);
                }
            });
        },
        show: function () {
            var self = this;

            self.$element.dialog({
                'dialogClass' : 'wp-dialog',
                'height': $(window).height() * 0.8,
                'width': Math.min(800, $(window).width() * 0.8),
                'title': hierarchyPostAttributes.dialog.title,
                'modal' : true,
                'autoOpen' : true,
                'closeOnEscape' : false,
                'buttons' : [
                    {
                        'text' : hierarchyPostAttributes.dialog.button.save.label,
                        'class' : 'button button-primary',
                        'click' : function() { return self.save(); }
                    },
                    {
                        'text' : hierarchyPostAttributes.dialog.button.cancel.label,
                        'class' : 'button',
                        'click' : function() { return self.destroy(); }
                    }
                ],
                'close': function() { return self.destroy(); }
            });
        },
        save : function () {
            var self = this,
                hierarchyPosts = this.$nestableList.nestable('serialise');

            self.spinner(true);
            $.ajax({
                url: hierarchyPostAttributes.ajaxUrl,
                method: 'post',
                data: {
                    action: hierarchyPostAttributes.dialog.action.save,
                    hierarchy_posts: hierarchyPosts
                },
                success: function (response) {
                    self.spinner(false);
                    self.destroy();

                    if (typeof self.callbackSave === 'function') {
                        self.callbackSave()
                    }
                },
                error: function (jqXHR) {
                    self.destroy();
                    new DialogError(jqXHR.responseText);
                }
            });
        },
        spinner: function(isShow) {
            if (isShow) {
                var $spinner = this.$element.find('.nestable-list-spinner').clone();
                $spinner.appendTo(this.$element.closest('.ui-dialog.ui-widget')).show();
            } else {
                this.$element.closest('.ui-dialog.ui-widget').find('.nestable-list-spinner').remove();
            }
        },
        destroy: function () {
            this.$element.dialog('close');
            this.$element.remove();
        }
    };

    function DialogError(message) {
        this.$element = $('<div id="hierarchy-post-error">' + message + '</div>');
        this.show()
    }
    DialogError.prototype = {
        show: function () {
            var self = this;

            self.$element.appendTo('body');
            self.$element.dialog({
                'dialogClass' : 'wp-dialog',
                'title': hierarchyPostAttributes.error.title,
                'modal' : true,
                'autoOpen' : true,
                'closeOnEscape' : false,
                'buttons' : [
                    {
                        'text' : hierarchyPostAttributes.error.button.ok.label,
                        'class' : 'button',
                        'click' : function() { return self.destroy(); }
                    }
                ],
                'close': function() { return self.destroy(); }
            });
        },
        destroy: function () {
            this.$element.dialog('close');
            this.$element.remove();
        }
    };

    $(document).ready(function() {
        new AttributeMetaBox();
    });
}(jQuery));
