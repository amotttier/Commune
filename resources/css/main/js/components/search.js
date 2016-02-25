"use strict";

// POPOVER PUBLIC CLASS DEFINITION
// ===============================

var SearchPopover = function (element, options) {
    this.init('search_popover', element, options)
}

SearchPopover.DEFAULTS = $.extend({} , $.fn.tooltip.Constructor.DEFAULTS, {
    placement: ''
    , trigger: 'manual'
    , container: 'body'
    , animation: false
    , template: '<div class="popover popover-search"><div class="popover-content"></div></div>'
})

SearchPopover.prototype = $.extend({}, $.fn.tooltip.Constructor.prototype)

SearchPopover.prototype.constructor = SearchPopover

SearchPopover.prototype.getDefaults = function () {
    return SearchPopover.DEFAULTS
}

SearchPopover.prototype.getCalculatedOffset = function (placement, pos, actualWidth, actualHeight) {
    return { top: pos.top + pos.height, left: pos.left + pos.width - actualWidth }
}

SearchPopover.prototype.hasContent = function () {
    return this.getContent()
}

SearchPopover.prototype.setContent = function () {
    this.tip().find('.popover-content').html(this.getContent())
}

SearchPopover.prototype.getContent = function () {
    return this.content
}

SearchPopover.prototype.changeContent = function(content) {
    this.content = content
}

$.fn.search_popover = function (option) {
    return this.each(function () {
        var $this   = $(this)
        var data    = $this.data('bs.search_popover')
        var options = typeof option == 'object' && option

        if (!data) $this.data('bs.search_popover', (data = new SearchPopover(this, options)))
        if (typeof option == 'string') data[option]()
    })
}

var Search = function (field, search_callback, select_callback, results_container) {
    var $field = $(field), currentItem;

    function getPO() {
        return $field.data('bs.search_popover');
    }

    function getTip() {
        return results_container || getPO().tip();
    }

    function setData(data) {
        if (results_container) {
            results_container.html(data);
        } else {
            getPO().changeContent(data);
            $field.search_popover('show');
        }

        $(document).on('click', clickElseWhere);
    }

    function clickElseWhere(event) {
        //click on field
        if ($(event.target).is($field)) return;

        //click on popup
        if ($.contains(getTip().get(0), event.target)) return;

        //we're not inside the results, we can close them
        $(document).off('click', clickElseWhere);
        $field.search_popover('hide');
    }

    function onType(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return onEnter();
        }
        if (event.keyCode == 38) return onUp();
        if (event.keyCode == 40) return onDown();

        //This part has to be done on Key Up as the character is added to the field after keydown
        $(this).one('keyup', function() {
            var val = $(this).val();

            if (val.length < 3) return;

            search_callback(val, setData);
        });

        return true;
    }

    function onShown() {
        setCurrent(getTip().find('li').first());
    }
    function onHidden() {
        currentItem = null;
    }
    function setCurrent(item) {
        getTip().find('li.active').removeClass('active');

        currentItem = item;
        currentItem.addClass('active');
    }

    function hasScrollbar() {
        return results_container && results_container.get(0).scrollHeight > results_container.height();
    }

    function scrollToView() {
        if(!hasScrollbar()) return;

        var parent = currentItem.parent(),
            childPos = currentItem.offset(),
            parentPos = parent.offset();

        parent.get(0).scrollTop = childPos.top - parentPos.top;
    }

    function onUp() {
        if (currentItem == null) {
            setCurrent(getTip().find('li').last());
            return;
        }

        var foundNew = false, prev = getTip().find('li').last(), items = getTip().find('li');

        items.each(function() {
            if (foundNew) return;

            if ($(this).hasClass('active')) {
                setCurrent(prev);
                foundNew = true;
                return;
            }

            prev = $(this);
        });

        scrollToView();
    }
    function onDown() {
        if (currentItem == null) {
            setCurrent(getTip().find('li').first());
            return;
        }

        var foundNew = false, isNext = false, items = getTip().find('li');

        items.each(function() {
            if (foundNew) return;

            if ($(this).hasClass('active')) {
                isNext = true;
                return;
            }

            if (isNext) {
                setCurrent($(this));
                foundNew = true;
            }
        });

        //in this case, we were at the end of the list
        if (isNext == true && foundNew == false) {
            setCurrent(items.first());
        }

        scrollToView();
    }

    function onEnter() {
        if (currentItem == null) return false;
        return select_callback(currentItem);
    }

    $field.on('keydown', onType);

    if(!results_container) {
        $field
            .on('shown.bs.search_popover', onShown)
            .on('hidden.bs.search_popover', onHidden)
            .search_popover();
    }
};
