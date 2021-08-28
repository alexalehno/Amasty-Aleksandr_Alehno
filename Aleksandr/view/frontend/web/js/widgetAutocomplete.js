define(['jquery', 'mage/url'], function ($,urlBuilder) {
    $.widget('mynamespace.autocomplete', {
        options: {
            minChars: null,
            searchUrl: urlBuilder.build('search/ajax/suggest'),
            searchResultList: null
        },
        _create: function () {
            this.options.searchResultList =
                $(this.element).find('.search-result-list');
            this.options.searchResultList.hide();
            $(this.element).find('#abc-search-input')
                .on('keyup', this.processAutocomplete.bind(this));
        },

        processAutocomplete: function (event) {
            let queryText = $(event.target).val();
            this.options.searchResultList.empty();
            if (queryText.length >= this.options.minChars) {
                $.getJSON(this.options.searchUrl, {
                    q: queryText
                }, function (data) {
                    if (data.length) {
                        let searchList = data.map(function (item) {
                            return $('<li/>').text(item.title);
                        });
                        this.options.searchResultList.append(searchList);
                    } else {
                        this.options.searchResultList.empty();
                    }
                    this.options.searchResultList.show();

                }.bind(this));
            }
        }
    });
    return $.mynamespace.autocomplete;
});

