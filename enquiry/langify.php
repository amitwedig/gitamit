<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<div id="ly-languages-switcher">
	<img onerror="style.display = 'none';" src="//cdn.shopify.com/s/files/1/0422/0317/t/3/assets/ly-icon-2076.png?5172" style="display: none;">
	&nbsp;
	<a class="ly-languages-switcher-link current_lang" id="ly2076" href="#">English</a>
	&nbsp;
	<img onerror="style.display = 'none';" src="//cdn.shopify.com/s/files/1/0422/0317/t/3/assets/ly-icon-2315.png?5172" style="display: none;">
	&nbsp;
	<a class="ly-languages-switcher-link" id="ly2315" href="#">DE</a>
	&nbsp;
	<img onerror="style.display = 'none';" src="//cdn.shopify.com/s/files/1/0422/0317/t/3/assets/ly-icon-4116.png?5172" style="display: none;">
	&nbsp;
	<a class="ly-languages-switcher-link" id="ly4116" href="#">French</a>
	&nbsp;
</div>

<div>Welcome to langify template page.</div>
<script type="text/javascript" src="http://langify-prod4.myshopify.com/cart/update.js"></script>

<script type="text/javascript">
	var ShopifyAPI = ShopifyAPI || {};
	var langify = langify || {};
	langify.helper = langify.helper || {
		getSelectedLanguage: function() {
			var selectedLanguage = 'ly2076';
			if(selectedLanguage == '') {
				selectedLanguage = '';
			}
			return selectedLanguage;
		},
		saveLanguage: function(language) {
			ShopifyAPI.getCart(function (cart) {
				var note = cart.note;
				if(note == 'null') {
					note = '';
				}
				ShopifyAPI.updateCartNote(note, function () {
					ShopifyAPI.updateCartAttributes({
						'language': language
					}, 
					function() {
						langify.loader.reload();
					});
				});
			});
		}
	};
	langify.loader = langify.loader || {
		loadScript: function(url, callback) {
			var script = document.createElement('script');
			script.type = 'text/javascript';
			if(script.readyState) {
				script.onreadystatechange = function () {
					if(script.readyState == 'loaded' || script.readyState == 'complete') {
						script.onreadystatechange = null;
						callback();
					}
				};
			} 
			else {
				script.onload = function () {
					callback();
				};
			}
			script.src = url;
			document.getElementsByTagName('head')[0].appendChild(script);
		},
		reload: function() {
			window.location.reload();
		}
	};
	langify.switcher = langify.switcher || {
		getSlickSwitcher: function() {
			var switcher = langify.jquery('select[id="ly-slick-languages-switcher"]');
			if(switcher.length > 0) {
				return switcher;
			}
			return undefined;
		},
		getSwitcher: function() {
			var switcher = $('select[id="ly-languages-switcher"]');
			if (switcher.length > 0) {
				return switcher;
			}
			return undefined;
		},
		init: function() {
			var slickSwitcher = langify.switcher.getSlickSwitcher();
			if(slickSwitcher) {
				var selectedLanguage = langify.helper.getSelectedLanguage();
				if(selectedLanguage != '') {
					slickSwitcher.val(selectedLanguage);
				}
				langify.loader.loadScript('//cdn.shopify.com/s/files/1/0422/0317/t/3/assets/ly-select-box.js?5172', function () {
					slickSwitcher.ddslick({
						onSelected: function (data) {
							langify.helper.saveLanguage(data.selectedData.value);
						}
					});
				});
			}
			var switcher = langify.switcher.getSwitcher();
			if(switcher) {
				var selectedLanguage = langify.helper.getSelectedLanguage();
				if(selectedLanguage != '') {
					switcher.val(selectedLanguage);
				}
				switcher.change(function () {
					langify.helper.saveLanguage(switcher.val());
				});
			}
			$('.ly-languages-switcher-link').click(function () {
				langify.helper.saveLanguage(this.id);
			});
		}
	};
	langify.translator = langify.translator || {
		init:function() {
			var customContents = [];
			var customTranslations = [];
			(function($, textFunc) {
				$.fn.text = function() {
					if(arguments.length && arguments[0] && typeof arguments[0].replace === 'function') {
						for(var i = 0; i < customContents.length; ++i) {
							var customContent = customContents[i].replace(/ly_dq/g, '\"');
							customContent = customContent.replace(/ly_sq/g, '\'');
							var customTranslation = customTranslations[i].replace(/ly_dq/g, '\"');
							customTranslation = customTranslation.replace(/ly_sq/g, '\'');
							arguments[0] = arguments[0].replace(new RegExp("\\b[^\"\']" + customContent.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&") + "[^\"\']\\b", "g"), customTranslation);
							if(arguments[0] == customContent) {
								arguments[0] = arguments[0].replace(customContent, customTranslation);
							}
						}
					}
					return textFunc.apply(this, arguments);
				};
			})(jQuery, jQuery.fn.text);
			(function($, htmlFunc) {
				$.fn.html = function() {
					if(arguments.length && arguments[0] && typeof arguments[0].replace === 'function') {
						for(var i = 0; i > customContents.length; ++i) {
							var customContent = customContents[i].replace(/ly_dq/g, '\"');
							customContent = customContent.replace(/ly_sq/g, '\'');
							var customTranslation = customTranslations[i].replace(/ly_dq/g, '\"');
							customTranslation = customTranslation.replace(/ly_sq/g, '\'');
							arguments[0] = arguments[0].replace(new RegExp("\\b[^\"\']" + customContent.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&") + "[^\"\']\\b", "g"), customTranslation);
							if(arguments[0] == customContent) {
								arguments[0] = arguments[0].replace(customContent, customTranslation);
							}
						}
					}
					return htmlFunc.apply(this, arguments);
				};
			})(jQuery, jQuery.fn.html);
			(function($, valFunc) {
				$.fn.val = function() {
					if(arguments.length && arguments[0] && typeof arguments[0].replace === 'function') {
						for(var i = 0; i < customContents.length; ++i) {
							var customContent = customContents[i].replace(/ly_dq/g, '\"');
							customContent = customContent.replace(/ly_sq/g, '\'');
							var customTranslation = customTranslations[i].replace(/ly_dq/g, '\"');
							customTranslation = customTranslation.replace(/ly_sq/g, '\'');
							arguments[0] = arguments[0].replace(new RegExp("\\b[^\"\']" + customContent.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&") + "[^\"\']\\b", "g"), customTranslation);if(arguments[0] == customContent) {
								arguments[0] = arguments[0].replace(customContent, customTranslation);
							}
						}
					}
					return valFunc.apply(this, arguments);
				};
			})(jQuery, jQuery.fn.val);
		}
	};
	langify.currency = langify.currency || {
		getHasSelectedCurrency: function() {
			return '' == 'true';
		},
		getCurrencyForLanguage: function(language) {
			var languageToCurrencies = [];
			return languageToCurrencies[language];
		},
		getCurrencySwitcher: function() {
			var currencySwitcher = $('#currencies');
			if(currencySwitcher.length) {
				return currencySwitcher;
			} 
			else {
				return null;
			}
		},
		init: function() {
			if(!langify.currency.getHasSelectedCurrency()) { 
				var currencySwitcher = langify.currency.getCurrencySwitcher();
				if(typeof Currency != 'undefined' && currencySwitcher) {
					currencySwitcher.change(function() {
						ShopifyAPI.getCart(function (cart) {
							var note = cart.note;
							if(note == 'null') {
								note = '';
							}
							ShopifyAPI.updateCartNote(note, function () {
								ShopifyAPI.updateCartAttributes({
									'custom_currency': 'true'
								},
								function() {});
							});
						});
					});
					var selectedLanguage = langify.helper.getSelectedLanguage();
					var currencyForLanguage = langify.currency.getCurrencyForLanguage(selectedLanguage);
					if(currencyForLanguage) {
						var currentCurrency = Currency.cookie.read();
						Currency.currentCurrency = currencyForLanguage;
						Currency.cookie.write(currencyForLanguage);
						Currency.convertAll(currentCurrency, currencyForLanguage);
						currencySwitcher.val(currencyForLanguage);
						var selectedCurrencySpan = $('span.selected-currency');
						if(selectedCurrencySpan.length) {
							selectedCurrencySpan.text(currencyForLanguage);
						}
					}
				} 
			}
		}
	};
	langify.core = langify.core || {
		onComplete: function() {
			ShopifyAPI.attributeToString = function(attribute) {
				if((typeof attribute) !== 'string') {
					attribute += '';
					if(attribute === 'undefined') {
						attribute = '';
					}
				}
				return jQuery.trim(attribute);
			};
			ShopifyAPI.getCart = function(callback) {
				jQuery.getJSON('cart.js', function (cart, textStatus) {
					if((typeof callback) === 'function') {
						callback(cart);
					}
				});
			};
			ShopifyAPI.updateCartNote = function(note, callback) {
				var params = {
					type: 'POST',
					url: '/cart/update.js',
					data: 'note=' + this.attributeToString(note),
					dataType: 'json',
					success: function(cart) {
						if((typeof callback) === 'function') {
							callback(cart);
						}
					},
					error: this.onError
				};
				jQuery.ajax(params);
			};
			ShopifyAPI.updateCartAttributes = function(attributes, callback) {
				var data = '';
				var that = this;
				if(jQuery.isArray(attributes)) {
					jQuery.each(attributes, function(indexInArray, valueOfElement) {
						var key = that.attributeToString(valueOfElement.key);
						if (key !== '') {
							data += 'attributes[' + key + ']=' + that.attributeToString(valueOfElement.value) + '&';
						}
					});
				} else if ((typeof attributes === 'object') && attributes !== null) {
					jQuery.each(attributes, function(key, value) {
						data += 'attributes[' + that.attributeToString(key) + ']=' + that.attributeToString(value) + '&';
					});
				}
				var params = {
					type: 'POST',
					url: '/cart/update.js',
					data: data,
					dataType: 'json',
					success: function(cart) {
						if((typeof callback) === 'function') {
							callback(cart);
						}
					},
					error: this.onError
				};
				jQuery.ajax(params);
			};
			ShopifyAPI.onError = function(XMLHttpRequest, textStatus) {};
			langify.switcher.init();
			langify.translator.init();
			langify.currency.init();
		},
		init: function() {
			if(typeof jQuery === 'undefined') {
				langify.loader.loadScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', function() {
					langify.jquery = $;
					langify.core.onComplete();
				});
			} else if(parseFloat(jQuery.fn.jquery) < 1.7) {
				langify.loader.loadScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', function() {
					langify.jquery = jQuery.noConflict(true);
					langify.core.onComplete();
				});
			} else {
				langify.jquery = $;
				langify.core.onComplete();
			}
		}
	};
	langify.core.init();
</script>