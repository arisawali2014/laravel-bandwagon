<style>
    .notiforder-snackbar {
        visibility: hidden;
        min-width: 250px;
        max-width: 400px;
        margin-left: 0px;
        background-color: transparent;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 20px;
        bottom: 20px;
    }

    .notiforder-snackbar.notiforder-show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s {{ config('bandwagon.display') - 0.5 }}s;
        animation: fadein 0.5s, fadeout 0.5s {{ config('bandwagon.display') - 0.5 }}s;
    }

    .notiforder-message {
        border-radius: .5rem;
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15);
        padding: .8rem;
        background-color: #fff;
    }

    .notiforder-text {
        margin: .1rem;
        font-family: sans-serif;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        text-decoration: none;
    }

    .notiforder-title {
        text-align: left;
    }

    .notiforder-title {
        color: #000;
        text-align: left;
        font-weight: 600;
    }

    .notiforder-subtitle {
        color: #555;
        text-align: left;
    }

    .notiforder-time {
        color: #888;
        text-align: right;
        font-size: 12px;
        margin-top: .3rem;
    }

    .notiforder-image {}

    a#notiforder-link {
        text-decoration: none;
        display: flex;
        flex-direction: row;
    }

    @media (max-width: 360px) {
        .notiforder-snackbar {
            max-width: 300px;
        }
    }

    @-webkit-keyframes fadein {
        from {
            bottom: 0;
            opacity: 0;
        }

        to {
            bottom: 20px;
            opacity: 1;
        }
    }

    @keyframes fadein {
        from {
            bottom: 0;
            opacity: 0;
        }

        to {
            bottom: 20px;
            opacity: 1;
        }
    }

    @-webkit-keyframes fadeout {
        from {
            bottom: 20px;
            opacity: 1;
        }

        to {
            bottom: 0;
            opacity: 0;
        }
    }

    @keyframes fadeout {
        from {
            bottom: 20px;
            opacity: 1;
        }

        to {
            bottom: 0;
            opacity: 0;
        }
    }

</style>
<div id="notiforder">
    <bandwagon-renderer class-snackbar="{{ $classSnackbar }}" class-message="{{ $classMessage }}"
        class-title="{{ $classTitle }}" class-subtitle="{{ $classSubtitle }}" class-time="{{ $classTime }}"
        class-image="{{ $classImage }}" />
</div>
<script>
    window.Bandwagon = @json($bandwagonScriptVariables);
</script>
<script src="{{ asset('vendor/bandwagon/app.js') }}"></script>
