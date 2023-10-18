<style>
    .um-footer {
        box-sizing: border-box;
        padding: 2em 1em;
        position: relative;
        padding-top: 50px;
        background-size: 100%;
        color: #fff;
        background-color: #0B1331;
    }

    .um-footer .um-container {
		display: block;
        max-width: 1440px;
        width: 100%;
        margin: 0 auto;
        padding-left: 16px;
        padding-right: 16px;
    }

    .footer__block-2 {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

    }

    .f-block__link {
        color: inherit;
        font-size: 1em;
        font-weight: bold;

    }

    .f-block__title {
        color: inherit;
        font-size: 2em;
    }

    @media (min-width: 768px) {
        .footer__block-2 {}

        .f-block__title {
            color: inherit;
            font-size: 2em;

        }

        .footer .um-container {
            padding-left: 40px;
            padding-right: 40px;
        }
    }

    @media (min-width: 1200px) {
        .footer .um-container {
            padding-left: 80px;
            padding-right: 80px;
        }
    }
</style>
<section class="um-footer" style="background-color: {{ data_get($data, 'background_color.value') }}; color: {{ data_get($data, 'font_color.value') }}">
    <div class="um-container">

        <ul class="footer__block-2 f-block text-md-end text-xxl-start">
            {{-- <li>
                <h3 class="f-block__title">Контакты</h3>
            </li> --}}
            <li style="margin-bottom: 1em;">
                <a 
					class="f-block__link" 
					href="tel:{{ preg_replace('~\D~', '', data_get($data, 'phone.value')) }}"
					data-key="phone"
				>
                    {{ data_get($data, 'phone.value') }}
                </a>
            </li>
            <li>
                <a class="f-block__link"
                    href="mailto:{{ data_get($data, 'email.value') }}" data-key="email">{{ data_get($data, 'email.value') }}</a>
            </li>
        </ul>

    </div>
</section>
