function initProfileComparisonBlock(visiblePlayer) {
    var cookieManager = new PlayersComparisonCookieManager(),
        $checkbox = $('#profile-compare-checkbox'),
        $checkboxBlock = $('#js-profile-compare-add');

    function updateDisabledStatus() {
        var isDisabled = (cookieManager.getPlayersCount() >= window.MAX_COMPARE_ACCOUNTS_NUMBER && !cookieManager.isNicknameInComparison(visiblePlayer));
        $checkbox.prop('disabled', isDisabled);
        $checkboxBlock.toggleClass('js-tooltip', isDisabled);
    }
    updateDisabledStatus();
        
    $checkbox
        .prop('checked', cookieManager.isNicknameInComparison(visiblePlayer))
        .on('change', function() {
            amplify.publish('playerscomparison:player-' + (this.checked ? 'added' : 'removed'), { nickname: visiblePlayer });
        });

    amplify.subscribe('playerscomparison:player-removed', function(data) {
        if (data.nickname === visiblePlayer) {
            $checkbox.prop('checked', false);
        }
        updateDisabledStatus();
    });

    amplify.subscribe('playerscomparison:player-added', function(data) {
        if (data.nickname === visiblePlayer) {
            $checkbox.prop('checked', true);
        }
        updateDisabledStatus();
    });
}
