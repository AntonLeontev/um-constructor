<style>
    .header {
        box-sizing: border-box;
        width: 100%;
        background-color: rgba(255, 255, 255, 1);
        z-index: 9999;
		color: #000;
    }

    .header__block {
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .header__logo {
        margin-bottom: 1em;
    }

    .header__name {
        font-size: 1em;
        margin-bottom: 1em;
    }

    .header__link {
        text-decoration: none;
        color: inherit;
        padding-bottom: 10px;
        margin-bottom: 1em;
    }

    .um-container {
        max-width: 1440px;
        width: 100%;
        margin: 0 auto;
        padding-left: 16px;
        padding-right: 16px;
    }

    @media (min-width: 768px) {
        .um-container {
            padding-left: 40px;
            padding-right: 40px;
        }
    }

    @media (min-width: 1200px) {
        .um-container {
            padding-left: 80px;
            padding-right: 80px;
        }
    }

    @media (min-width: 768px) {
        .header__block {
            padding: 40px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .header__logo {
            margin-bottom: 0;
        }

        .header__name {
            font-size: 1em;
            margin-bottom: 0;
        }

        .header__link {
            text-decoration: none;
            color: inherit;
            padding-bottom: 10px;
            margin-bottom: 0;
        }
    }
</style>

<section class="header" style="background-color: {{ data_get($data, 'background_color.value') }}; color: {{ data_get($data, 'font_color.value') }}">
    <div class="um-container header__block">

        <a class="header__logo" href="/">
            <img data-key="logo" src="{{ data_get($data, 'logo.value') }}" alt="logo"
                width="{{ data_get($data, 'logo.width') }}" height="{{ data_get($data, 'logo.height') }}">
        </a>
        <div class="header__name">{{ data_get($data, 'company.value') }}</div>
        <a class="header__link"
            href="tel:{{ preg_replace('~\D~', '', data_get($data, 'phone.value')) }}">{{ data_get($data, 'phone.value') }}</a>
    </div>
</section>
