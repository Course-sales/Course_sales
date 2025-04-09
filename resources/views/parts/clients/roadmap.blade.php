<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>{{!empty($pageTitle) ? $pageTitle.' - ATX' : 'Empty'}}</title>
    <style id="style_ladi" type="text/css">
        a,
        abbr,
        acronym,
        address,
        applet,
        article,
        aside,
        audio,
        b,
        big,
        blockquote,
        body,
        button,
        canvas,
        caption,
        center,
        cite,
        code,
        dd,
        del,
        details,
        dfn,
        div,
        dl,
        dt,
        em,
        embed,
        fieldset,
        figcaption,
        figure,
        footer,
        form,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        header,
        hgroup,
        html,
        i,
        iframe,
        img,
        input,
        ins,
        kbd,
        label,
        legend,
        li,
        mark,
        menu,
        nav,
        object,
        ol,
        output,
        p,
        pre,
        q,
        ruby,
        s,
        samp,
        section,
        select,
        small,
        span,
        strike,
        strong,
        sub,
        summary,
        sup,
        table,
        tbody,
        td,
        textarea,
        tfoot,
        th,
        thead,
        time,
        tr,
        tt,
        u,
        ul,
        var,
        video {
            margin: 0;
            padding: 0;
            border: 0;
            outline: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
            box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        menu,
        nav,
        section {
            display: block
        }

        body {
            line-height: 1
        }

        a {
            text-decoration: none
        }

        ol,
        ul {
            list-style: none
        }

        blockquote,
        q {
            quotes: none
        }

        blockquote:after,
        blockquote:before,
        q:after,
        q:before {
            content: '';
            content: none
        }

        table {
            border-collapse: collapse;
            border-spacing: 0
        }

        .ladi-loading {
            z-index: 900000000000;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, .1)
        }

        .ladi-loading .loading {
            width: 80px;
            height: 80px;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            margin: auto;
            overflow: hidden;
            position: absolute
        }

        .ladi-loading .loading div {
            position: absolute;
            width: 6px;
            height: 6px;
            background: #fff;
            border-radius: 50%;
            animation: ladi-loading 1.2s linear infinite
        }

        .ladi-loading .loading div:nth-child(1) {
            animation-delay: 0s;
            top: 37px;
            left: 66px
        }

        .ladi-loading .loading div:nth-child(2) {
            animation-delay: -.1s;
            top: 22px;
            left: 62px
        }

        .ladi-loading .loading div:nth-child(3) {
            animation-delay: -.2s;
            top: 11px;
            left: 52px
        }

        .ladi-loading .loading div:nth-child(4) {
            animation-delay: -.3s;
            top: 7px;
            left: 37px
        }

        .ladi-loading .loading div:nth-child(5) {
            animation-delay: -.4s;
            top: 11px;
            left: 22px
        }

        .ladi-loading .loading div:nth-child(6) {
            animation-delay: -.5s;
            top: 22px;
            left: 11px
        }

        .ladi-loading .loading div:nth-child(7) {
            animation-delay: -.6s;
            top: 37px;
            left: 7px
        }

        .ladi-loading .loading div:nth-child(8) {
            animation-delay: -.7s;
            top: 52px;
            left: 11px
        }

        .ladi-loading .loading div:nth-child(9) {
            animation-delay: -.8s;
            top: 62px;
            left: 22px
        }

        .ladi-loading .loading div:nth-child(10) {
            animation-delay: -.9s;
            top: 66px;
            left: 37px
        }

        .ladi-loading .loading div:nth-child(11) {
            animation-delay: -1s;
            top: 62px;
            left: 52px
        }

        .ladi-loading .loading div:nth-child(12) {
            animation-delay: -1.1s;
            top: 52px;
            left: 62px
        }

        @keyframes ladi-loading {

            0%,
            100%,
            20%,
            80% {
                transform: scale(1)
            }

            50% {
                transform: scale(1.5)
            }
        }

        .ladipage-message {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 10000000000;
            background: rgba(0, 0, 0, .3)
        }

        .ladipage-message .ladipage-message-box {
            width: 400px;
            max-width: calc(100% - 50px);
            height: 160px;
            border: 1px solid rgba(0, 0, 0, .3);
            background-color: #fff;
            position: fixed;
            top: calc(50% - 155px);
            left: 0;
            right: 0;
            margin: auto;
            border-radius: 10px
        }

        .ladipage-message .ladipage-message-box span {
            display: block;
            background-color: rgba(6, 21, 40, .05);
            color: #000;
            padding: 12px 15px;
            font-weight: 600;
            font-size: 16px;
            line-height: 16px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px
        }

        .ladipage-message .ladipage-message-box .ladipage-message-text {
            display: -webkit-box;
            font-size: 14px;
            padding: 0 20px;
            margin-top: 10px;
            line-height: 18px;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis
        }

        .ladipage-message .ladipage-message-box .ladipage-message-close {
            display: block;
            position: absolute;
            right: 15px;
            bottom: 10px;
            margin: 0 auto;
            padding: 10px 0;
            border: none;
            width: 80px;
            text-transform: uppercase;
            text-align: center;
            color: #000;
            background-color: #e6e6e6;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            line-height: 14px;
            font-weight: 600;
            cursor: pointer;
            outline: 0
        }

        .lightbox-screen {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            margin: auto;
            z-index: 9000000080;
            background: rgba(0, 0, 0, .5)
        }

        .lightbox-screen .lightbox-close {
            position: absolute;
            z-index: 9000000090;
            cursor: pointer
        }

        .lightbox-screen .lightbox-hidden {
            display: none
        }

        .lightbox-screen .lightbox-close {
            width: 16px;
            height: 16px;
            margin: 10px;
            background-repeat: no-repeat;
            background-position: center center;
            background-image: url("data:image/svg+xml;utf8, %3Csvg%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20fill%3D%22%23fff%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M23.4144%202.00015L2.00015%2023.4144L0.585938%2022.0002L22.0002%200.585938L23.4144%202.00015Z%22%3E%3C%2Fpath%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M2.00015%200.585938L23.4144%2022.0002L22.0002%2023.4144L0.585938%202.00015L2.00015%200.585938Z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E")
        }

        body {
            font-size: 12px;
            -ms-text-size-adjust: none;
            -moz-text-size-adjust: none;
            -o-text-size-adjust: none;
            -webkit-text-size-adjust: none;
            background-color: #fff;
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .ladi-transition {
            transition: all 150ms linear 0s;
        }

        .z-index-1 {
            z-index: 1;
        }

        .opacity-0 {
            opacity: 0;
        }

        .height-0 {
            height: 0 !important;
        }

        .pointer-events-none {
            pointer-events: none;
        }

        .transition-parent-collapse-height {
            transition: height 150ms linear 0s;
        }

        .transition-parent-collapse-top {
            transition: top 150ms linear 0s;
        }

        .transition-readmore {
            transition: height 350ms linear 0s;
        }

        .transition-collapse {
            transition: height 150ms linear 0s;
        }

        body.grab {
            cursor: grab;
        }

        .ladi-wraper {
            width: 100%;
            min-height: 100%;
            overflow: hidden;
        }

        .ladi-container {
            position: relative;
            margin: 0 auto;
            height: 100%;
        }

        .ladi-overlay {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            pointer-events: none;
        }

        .ladi-element {
            position: absolute;
        }

        @media (hover: hover) {
            .ladi-check-hover {
                opacity: 0;
            }
        }

        .ladi-section {
            margin: 0 auto;
            position: relative;
        }

        .ladi-section[data-tab-id] {
            display: none;
        }

        .ladi-section.selected[data-tab-id] {
            display: block;
        }

        .ladi-section .ladi-section-background {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .ladi-box {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .ladi-button {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .ladi-button:active {
            transform: translateY(2px);
            transition: transform 0.2s linear;
        }

        .ladi-button .ladi-button-background {
            height: 100%;
            width: 100%;
            pointer-events: none;
            transition: inherit;
        }

        .ladi-button>.ladi-button-headline,
        .ladi-button>.ladi-button-shape {
            width: 100% !important;
            height: 100% !important;
            top: 0 !important;
            left: 0 !important;
            display: table;
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }

        .ladi-button>.ladi-button-shape .ladi-shape {
            margin: auto;
            top: 0;
            bottom: 0;
        }

        .ladi-button>.ladi-button-headline .ladi-headline {
            display: table-cell;
            vertical-align: middle;
        }

        .ladi-video {
            position: absolute;
            width: 100%;
            height: 100%;
            cursor: pointer;
            overflow: hidden;
        }

        .ladi-video .ladi-video-background {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }

        .button-unmute {
            cursor: pointer;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
        }

        .button-unmute div {
            background-image: url("data:image/svg+xml;utf8, %3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2036%2036%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20fill%3D%22%23fff%22%3E%3Cpath%20d%3D%22m%2021.48%2C17.98%20c%200%2C-1.77%20-1.02%2C-3.29%20-2.5%2C-4.03%20v%202.21%20l%202.45%2C2.45%20c%20.03%2C-0.2%20.05%2C-0.41%20.05%2C-0.63%20z%20m%202.5%2C0%20c%200%2C.94%20-0.2%2C1.82%20-0.54%2C2.64%20l%201.51%2C1.51%20c%20.66%2C-1.24%201.03%2C-2.65%201.03%2C-4.15%200%2C-4.28%20-2.99%2C-7.86%20-7%2C-8.76%20v%202.05%20c%202.89%2C.86%205%2C3.54%205%2C6.71%20z%20M%209.25%2C8.98%20l%20-1.27%2C1.26%204.72%2C4.73%20H%207.98%20v%206%20H%2011.98%20l%205%2C5%20v%20-6.73%20l%204.25%2C4.25%20c%20-0.67%2C.52%20-1.42%2C.93%20-2.25%2C1.18%20v%202.06%20c%201.38%2C-0.31%202.63%2C-0.95%203.69%2C-1.81%20l%202.04%2C2.05%201.27%2C-1.27%20-9%2C-9%20-7.72%2C-7.72%20z%20m%207.72%2C.99%20-2.09%2C2.08%202.09%2C2.09%20V%209.98%20z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E");
            width: 60px;
            height: 60px;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            margin: auto;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 100%;
            background-size: 90%;
            background-repeat: no-repeat;
            background-position: center center;
        }

        .ladi-group {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .ladi-shape {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .ladi-cart-number {
            position: absolute;
            top: -2px;
            right: -7px;
            background: #f36e36;
            text-align: center;
            width: 18px;
            height: 18px;
            line-height: 18px;
            font-size: 12px;
            font-weight: bold;
            color: #fff;
            border-radius: 100%;
        }

        .ladi-image {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .ladi-image .ladi-image-background {
            background-repeat: no-repeat;
            background-position: left top;
            background-size: cover;
            background-attachment: scroll;
            background-origin: content-box;
            position: absolute;
            margin: 0 auto;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .ladi-headline {
            width: 100%;
            display: inline-block;
            word-break: break-word;
            background-size: cover;
            background-position: center center;
        }

        .ladi-headline a {
            text-decoration: underline;
        }

        .ladi-paragraph {
            width: 100%;
            display: inline-block;
            word-break: break-word;
        }

        .ladi-paragraph a {
            text-decoration: underline;
        }

        .ladi-line {
            position: relative;
        }

        .ladi-line .ladi-line-container {
            border-bottom: 0 !important;
            border-right: 0 !important;
            width: 100%;
            height: 100%;
        }

        a[data-action] {
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            cursor: pointer
        }

        a:visited {
            color: inherit
        }

        a:link {
            color: inherit
        }

        [data-opacity="0"] {
            opacity: 0
        }

        [data-hidden="true"] {
            display: none
        }

        [data-action="true"] {
            cursor: pointer
        }

        .ladi-hidden {
            display: none
        }

        .ladi-animation-hidden {
            visibility: hidden !important;
            opacity: 0 !important
        }

        .element-click-selected {
            cursor: pointer
        }

        .is-2nd-click {
            cursor: pointer
        }

        .ladi-button-shape.is-2nd-click,
        .ladi-accordion-shape.is-2nd-click {
            z-index: 1
        }

        .backdrop-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 90000060
        }

        .backdrop-dropbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 90000040
        }

        .ladi-lazyload {
            background-image: none !important;
        }

        .ladi-list-paragraph ul li.ladi-lazyload:before {
            background-image: none !important;
        }

        @media (min-width: 768px) {}

        @media (max-width: 767px) {
            .ladi-element.ladi-auto-scroll {
                overflow-x: auto;
                overflow-y: hidden;
                width: 100% !important;
                left: 0 !important;
                -webkit-overflow-scrolling: touch;
            }

            [data-hint]:not([data-timeout-id-copied]):before,
            [data-hint]:not([data-timeout-id-copied]):after {
                display: none !important;
            }

            .ladi-section.ladi-auto-scroll {
                overflow-x: auto;
                overflow-y: hidden;
                -webkit-overflow-scrolling: touch;
            }
        }
        </style>
        <style id="style_page" type="text/css">
        body {
            direction: ltr;
        }

        @media (min-width: 768px) {
            .ladi-section .ladi-container {
                width: 960px;
            }
        }

        @media (max-width: 767px) {
            .ladi-section .ladi-container {
                width: 420px;
            }
        }

        body {
            font-family: "Open Sans", sans-serif
        }
    </style>
    <style id="style_element" type="text/css">
        #SECTION285>.ladi-section-background {
            background-size: 100%;
            background-origin: content-box;
            background-position: 50% 0%;
            background-repeat: no-repeat;
            background-attachment: scroll;
        }

        #SECTION289>.ladi-section-background,
        #SECTION1009>.ladi-section-background,
        #BOX1019>.ladi-box,
        #BOX1022>.ladi-box,
        #BOX1013>.ladi-box,
        #BOX1016>.ladi-box,
        #SECTION860>.ladi-section-background {
            background-color: rgb(255, 255, 255);
        }

        #SECTION289>.ladi-section-background {
            opacity: 0;
        }

        #HEADLINE291>.ladi-headline {
            font-family: "Open Sans", sans-serif;
            font-weight: bold;
            color: rgb(60, 69, 120);
        }

        #HEADLINE291>.ladi-headline:hover,
        #PARAGRAPH292>.ladi-paragraph:hover,
        #SHAPE424:hover>.ladi-shape,
        #PARAGRAPH1032>.ladi-paragraph:hover,
        #BUTTON1039>.ladi-button:hover,
        #BUTTON_TEXT1039>.ladi-headline:hover,
        #BUTTON1041>.ladi-button:hover,
        #BUTTON_TEXT1041>.ladi-headline:hover,
        #BUTTON1043>.ladi-button:hover,
        #BUTTON_TEXT1043>.ladi-headline:hover,
        #BUTTON1027>.ladi-button:hover,
        #BUTTON_TEXT1027>.ladi-headline:hover,
        #BUTTON1028>.ladi-button:hover,
        #BUTTON_TEXT1028>.ladi-headline:hover,
        #BUTTON1030>.ladi-button:hover,
        #BUTTON_TEXT1030>.ladi-headline:hover,
        #HEADLINE460>.ladi-headline:hover,
        #BOX296>.ladi-box:hover,
        #IMAGE299:hover>.ladi-image,
        #HEADLINE298>.ladi-headline:hover,
        #PARAGRAPH297>.ladi-paragraph:hover,
        #BOX310>.ladi-box:hover,
        #IMAGE311:hover>.ladi-image,
        #HEADLINE312>.ladi-headline:hover,
        #PARAGRAPH313>.ladi-paragraph:hover,
        #BOX314>.ladi-box:hover,
        #IMAGE315:hover>.ladi-image,
        #HEADLINE316>.ladi-headline:hover,
        #PARAGRAPH317>.ladi-paragraph:hover,
        #BUTTON530>.ladi-button:hover,
        #BUTTON_TEXT530>.ladi-headline:hover,
        #BUTTON531>.ladi-button:hover,
        #BUTTON_TEXT531>.ladi-headline:hover,
        #BUTTON532>.ladi-button:hover,
        #BUTTON_TEXT532>.ladi-headline:hover,
        #HEADLINE430>.ladi-headline:hover,
        #PARAGRAPH431>.ladi-paragraph:hover,
        #BOX432>.ladi-box:hover,
        #HEADLINE433>.ladi-headline:hover,
        #HEADLINE435>.ladi-headline:hover,
        #PARAGRAPH436>.ladi-paragraph:hover,
        #BOX437>.ladi-box:hover,
        #HEADLINE438>.ladi-headline:hover,
        #HEADLINE440>.ladi-headline:hover,
        #PARAGRAPH441>.ladi-paragraph:hover,
        #BOX442>.ladi-box:hover,
        #HEADLINE443>.ladi-headline:hover,
        #HEADLINE445>.ladi-headline:hover,
        #PARAGRAPH446>.ladi-paragraph:hover,
        #BOX447>.ladi-box:hover,
        #HEADLINE448>.ladi-headline:hover,
        #HEADLINE450>.ladi-headline:hover,
        #PARAGRAPH451>.ladi-paragraph:hover,
        #BOX452>.ladi-box:hover,
        #HEADLINE453>.ladi-headline:hover,
        #HEADLINE455>.ladi-headline:hover,
        #PARAGRAPH456>.ladi-paragraph:hover,
        #BOX457>.ladi-box:hover,
        #HEADLINE458>.ladi-headline:hover,
        #HEADLINE427>.ladi-headline:hover,
        #HEADLINE1010>.ladi-headline:hover,
        #IMAGE1011:hover>.ladi-image,
        #BOX1019>.ladi-box:hover,
        #HEADLINE1020>.ladi-headline:hover,
        #BOX1022>.ladi-box:hover,
        #HEADLINE1023>.ladi-headline:hover,
        #BOX1013>.ladi-box:hover,
        #HEADLINE1014>.ladi-headline:hover,
        #BOX1016>.ladi-box:hover,
        #HEADLINE1017>.ladi-headline:hover,
        #HEADLINE465>.ladi-headline:hover,
        #BOX630>.ladi-box:hover,
        #IMAGE631:hover>.ladi-image,
        #HEADLINE632>.ladi-headline:hover,
        #PARAGRAPH633>.ladi-paragraph:hover,
        #BOX635>.ladi-box:hover,
        #IMAGE636:hover>.ladi-image,
        #HEADLINE637>.ladi-headline:hover,
        #PARAGRAPH638>.ladi-paragraph:hover,
        #BOX640>.ladi-box:hover,
        #IMAGE641:hover>.ladi-image,
        #HEADLINE642>.ladi-headline:hover,
        #PARAGRAPH643>.ladi-paragraph:hover,
        #BUTTON644>.ladi-button:hover,
        #BUTTON_TEXT644>.ladi-headline:hover,
        #BUTTON646>.ladi-button:hover,
        #BUTTON_TEXT646>.ladi-headline:hover,
        #BUTTON648>.ladi-button:hover,
        #BUTTON_TEXT648>.ladi-headline:hover,
        #HEADLINE897>.ladi-headline:hover,
        #HEADLINE898>.ladi-headline:hover,
        #IMAGE899:hover>.ladi-image,
        #HEADLINE883>.ladi-headline:hover,
        #PARAGRAPH884>.ladi-paragraph:hover,
        #BOX881>.ladi-box:hover,
        #SHAPE882:hover>.ladi-shape,
        #HEADLINE895>.ladi-headline:hover,
        #PARAGRAPH896>.ladi-paragraph:hover,
        #BOX1052>.ladi-box:hover,
        #SHAPE1053:hover>.ladi-shape,
        #HEADLINE865>.ladi-headline:hover,
        #PARAGRAPH866>.ladi-paragraph:hover,
        #BOX1055>.ladi-box:hover,
        #SHAPE1056:hover>.ladi-shape,
        #HEADLINE877>.ladi-headline:hover,
        #PARAGRAPH878>.ladi-paragraph:hover,
        #SHAPE876:hover>.ladi-shape,
        #BOX1058>.ladi-box:hover,
        #SHAPE1059:hover>.ladi-shape,
        #HEADLINE871>.ladi-headline:hover,
        #PARAGRAPH872>.ladi-paragraph:hover,
        #BOX1061>.ladi-box:hover,
        #SHAPE1062:hover>.ladi-shape,
        #HEADLINE889>.ladi-headline:hover,
        #PARAGRAPH890>.ladi-paragraph:hover,
        #BOX1064>.ladi-box:hover,
        #SHAPE1065:hover>.ladi-shape,
        #HEADLINE901>.ladi-headline:hover,
        #SHAPE904:hover>.ladi-shape,
        #HEADLINE905>.ladi-headline:hover,
        #PARAGRAPH906>.ladi-paragraph:hover,
        #SHAPE908:hover>.ladi-shape,
        #HEADLINE909>.ladi-headline:hover,
        #PARAGRAPH910>.ladi-paragraph:hover,
        #SHAPE912:hover>.ladi-shape,
        #HEADLINE913>.ladi-headline:hover,
        #PARAGRAPH914>.ladi-paragraph:hover,
        #SHAPE921:hover>.ladi-shape,
        #HEADLINE922>.ladi-headline:hover,
        #PARAGRAPH923>.ladi-paragraph:hover,
        #SHAPE925:hover>.ladi-shape,
        #HEADLINE926>.ladi-headline:hover,
        #PARAGRAPH927>.ladi-paragraph:hover,
        #SHAPE929:hover>.ladi-shape,
        #HEADLINE930>.ladi-headline:hover,
        #PARAGRAPH931>.ladi-paragraph:hover,
        #IMAGE936:hover>.ladi-image,
        #HEADLINE515>.ladi-headline:hover,
        #BOX1007>.ladi-box:hover,
        #IMAGE330:hover>.ladi-image,
        #HEADLINE331>.ladi-headline:hover,
        #PARAGRAPH334>.ladi-paragraph:hover,
        #BUTTON1005>.ladi-button:hover,
        #BUTTON_TEXT1005>.ladi-headline:hover,
        #BOX739>.ladi-box:hover,
        #HEADLINE740>.ladi-headline:hover,
        #HEADLINE741>.ladi-headline:hover,
        #BOX745>.ladi-box:hover,
        #HEADLINE746>.ladi-headline:hover,
        #HEADLINE747>.ladi-headline:hover,
        #BOX757>.ladi-box:hover,
        #HEADLINE758>.ladi-headline:hover,
        #HEADLINE759>.ladi-headline:hover,
        #HEADLINE769>.ladi-headline:hover,
        #SHAPE1074:hover>.ladi-shape,
        #SHAPE1075:hover>.ladi-shape,
        #SHAPE1076:hover>.ladi-shape,
        #HEADLINE1077>.ladi-headline:hover,
        #SHAPE1078:hover>.ladi-shape,
        #SHAPE1079:hover>.ladi-shape,
        #HEADLINE1080>.ladi-headline:hover,
        #HEADLINE1081>.ladi-headline:hover,
        #HEADLINE1082>.ladi-headline:hover,
        #HEADLINE1083>.ladi-headline:hover,
        #HEADLINE1084>.ladi-headline:hover {
            opacity: 1;
        }

        #PARAGRAPH292>.ladi-paragraph,
        #PARAGRAPH1032>.ladi-paragraph {
            font-family: Roboto, sans-serif;
            color: rgb(110, 110, 110);
            text-align: justify;
        }

        #VIDEO424>.ladi-video>.ladi-video-background {
            background-size: cover;
            background-origin: content-box;
            background-position: 50% 50%;
            background-repeat: no-repeat;
            background-attachment: scroll;
        }

        #SHAPE424 {
            width: 60px;
            height: 60px;
        }

        #SHAPE424 svg:last-child {
            fill: rgba(0, 0, 0, 0.5);
        }

        #BUTTON1039,
        #BUTTON1041,
        #BUTTON1043,
        #BUTTON1027,
        #BUTTON1028,
        #BUTTON1030 {
            height: 29px;
        }

        #BUTTON1039>.ladi-button>.ladi-button-background,
        #BUTTON1041>.ladi-button>.ladi-button-background,
        #BUTTON1043>.ladi-button>.ladi-button-background,
        #BUTTON1027>.ladi-button>.ladi-button-background,
        #BUTTON1028>.ladi-button>.ladi-button-background,
        #BUTTON1030>.ladi-button>.ladi-button-background {
            background-image: linear-gradient(rgb(102, 161, 238), rgb(47, 123, 254));
            background-color: initial;
            background-size: initial;
            background-origin: initial;
            background-position: initial;
            background-repeat: initial;
            background-attachment: initial;
        }

        #BUTTON1039>.ladi-button>.ladi-button-background,
        #BUTTON1041>.ladi-button>.ladi-button-background,
        #BUTTON1043>.ladi-button>.ladi-button-background,
        #BUTTON1027>.ladi-button>.ladi-button-background,
        #BUTTON1028>.ladi-button>.ladi-button-background,
        #BUTTON1030>.ladi-button>.ladi-button-background,
        #BUTTON530>.ladi-button>.ladi-button-background,
        #BUTTON531>.ladi-button>.ladi-button-background,
        #BUTTON532>.ladi-button>.ladi-button-background,
        #BUTTON644>.ladi-button>.ladi-button-background,
        #BUTTON646>.ladi-button>.ladi-button-background,
        #BUTTON648>.ladi-button>.ladi-button-background,
        #BUTTON1005>.ladi-button>.ladi-button-background {
            -webkit-background-clip: initial;
        }

        #BUTTON1039>.ladi-button,
        #BUTTON1041>.ladi-button,
        #BUTTON1043>.ladi-button,
        #BUTTON1027>.ladi-button,
        #BUTTON1028>.ladi-button,
        #BUTTON1030>.ladi-button {
            border-width: 0px;
            border-radius: 8px;
            border-color: rgb(0, 0, 0);
        }

        #BUTTON_TEXT1039,
        #BUTTON_TEXT1041,
        #BUTTON_TEXT1043,
        #BUTTON_TEXT1027,
        #BUTTON_TEXT1028,
        #BUTTON_TEXT1030,
        #BUTTON_TEXT530,
        #BUTTON_TEXT531,
        #BUTTON_TEXT532,
        #BUTTON_TEXT644,
        #BUTTON_TEXT646,
        #BUTTON_TEXT648,
        #BUTTON_TEXT1005 {
            top: 9px;
            left: 0px;
        }

        #BUTTON_TEXT1039>.ladi-headline,
        #BUTTON_TEXT1043>.ladi-headline {
            font-weight: bold;
            line-height: 1.6;
            color: rgb(255, 255, 255);
            text-align: left;
        }

        #BUTTON_TEXT1041>.ladi-headline,
        #HEADLINE460>.ladi-headline,
        #HEADLINE465>.ladi-headline,
        #HEADLINE515>.ladi-headline {
            font-weight: bold;
            line-height: 1.6;
            color: rgb(255, 255, 255);
            text-align: center;
        }

        #BUTTON1027,
        #BOX296,
        #IMAGE299>.ladi-image>.ladi-image-background,
        #BOX310,
        #IMAGE311>.ladi-image>.ladi-image-background,
        #BOX314,
        #IMAGE315>.ladi-image>.ladi-image-background,
        #BOX432,
        #BOX437,
        #BOX442,
        #BOX447,
        #BOX452,
        #BOX457,
        #BOX1019,
        #BOX1022,
        #BOX1013,
        #BOX1016,
        #BOX630,
        #IMAGE631>.ladi-image>.ladi-image-background,
        #BOX635,
        #IMAGE636>.ladi-image>.ladi-image-background,
        #BOX640,
        #IMAGE641>.ladi-image>.ladi-image-background,
        #BOX881,
        #BOX1052,
        #GROUP1054,
        #BOX1055,
        #BOX1058,
        #BOX1061,
        #BOX1064,
        #SHAPE921,
        #SHAPE925,
        #SHAPE929,
        #IMAGE330>.ladi-image>.ladi-image-background,
        #BOX739,
        #BOX745,
        #BOX757 {
            top: 0px;
            left: 0px;
        }

        #BUTTON_TEXT1027>.ladi-headline,
        #BUTTON_TEXT1028>.ladi-headline,
        #BUTTON_TEXT1030>.ladi-headline {
            font-weight: bold;
            line-height: 1.6;
            color: rgb(255, 255, 255);
        }

        #SECTION459>.ladi-section-background,
        #SECTION464>.ladi-section-background,
        #SECTION514>.ladi-section-background {
            background-color: rgb(17, 10, 92);
        }

        #SECTION295>.ladi-section-background,
        #SECTION628>.ladi-section-background,
        #SECTION900>.ladi-section-background {
            background-color: rgb(245, 245, 245);
        }

        #BOX296>.ladi-box {
            border-width: 0px;
            border-color: rgb(0, 0, 0);
        }

        #BOX296>.ladi-box,
        #BOX310>.ladi-box,
        #BOX314>.ladi-box {
            background-image: linear-gradient(rgb(158, 158, 158), rgb(53, 54, 57));
            background-color: initial;
            background-size: initial;
            background-origin: initial;
            background-position: initial;
            background-repeat: initial;
            background-attachment: initial;
        }

        #BOX296>.ladi-box,
        #BOX310>.ladi-box,
        #BOX314>.ladi-box,
        #BOX630>.ladi-box,
        #BOX635>.ladi-box,
        #BOX640>.ladi-box {
            -webkit-background-clip: initial;
            box-shadow: rgb(224, 224, 224) 0px 2px 0px 0px;
        }

        #IMAGE299,
        #IMAGE315,
        #HEADLINE430,
        #HEADLINE435,
        #HEADLINE440,
        #HEADLINE445,
        #HEADLINE450,
        #HEADLINE455,
        #IMAGE1011>.ladi-image>.ladi-image-background,
        #IMAGE631,
        #IMAGE641,
        #IMAGE899>.ladi-image>.ladi-image-background,
        #GROUP903,
        #SHAPE904,
        #SHAPE912,
        #GROUP920,
        #IMAGE936>.ladi-image>.ladi-image-background,
        #HEADLINE747,
        #HEADLINE759,
        #HEADLINE769 {
            top: 0px;
        }

        #HEADLINE298>.ladi-headline,
        #HEADLINE312>.ladi-headline,
        #HEADLINE316>.ladi-headline,
        #HEADLINE632>.ladi-headline,
        #HEADLINE637>.ladi-headline,
        #HEADLINE642>.ladi-headline {
            font-family: Montserrat, sans-serif;
            font-weight: bold;
            color: rgb(255, 255, 255);
            text-align: center;
        }

        #PARAGRAPH297>.ladi-paragraph,
        #PARAGRAPH313>.ladi-paragraph,
        #PARAGRAPH317>.ladi-paragraph,
        #PARAGRAPH633>.ladi-paragraph,
        #PARAGRAPH638>.ladi-paragraph,
        #PARAGRAPH643>.ladi-paragraph {
            font-family: Roboto, sans-serif;
            line-height: 1.4;
            color: rgb(255, 255, 255);
            text-align: center;
        }

        #IMAGE311,
        #IMAGE636,
        #GROUP736,
        #GROUP738,
        #GROUP744,
        #GROUP756,
        #LINE1085 {
            left: 0px;
        }

        #BUTTON530,
        #BUTTON644 {
            width: 160px;
            height: 40px;
        }

        #BUTTON530>.ladi-button>.ladi-button-background,
        #BUTTON531>.ladi-button>.ladi-button-background,
        #BUTTON532>.ladi-button>.ladi-button-background,
        #BUTTON644>.ladi-button>.ladi-button-background,
        #BUTTON646>.ladi-button>.ladi-button-background,
        #BUTTON648>.ladi-button>.ladi-button-background,
        #BUTTON1005>.ladi-button>.ladi-button-background {
            background-image: linear-gradient(rgb(13, 97, 242), rgb(47, 123, 254));
            background-color: initial;
            background-size: initial;
            background-origin: initial;
            background-position: initial;
            background-repeat: initial;
            background-attachment: initial;
        }

        #BUTTON530>.ladi-button {
            border-radius: 0px;
        }

        #BUTTON_TEXT530,
        #BUTTON531,
        #BUTTON_TEXT531,
        #BUTTON532,
        #BUTTON_TEXT532,
        #BUTTON_TEXT644,
        #BUTTON646,
        #BUTTON_TEXT646,
        #BUTTON648,
        #BUTTON_TEXT648,
        #BUTTON1005,
        #BUTTON_TEXT1005 {
            width: 160px;
        }

        #BUTTON_TEXT530>.ladi-headline,
        #BUTTON_TEXT531>.ladi-headline,
        #BUTTON_TEXT532>.ladi-headline,
        #BUTTON_TEXT644>.ladi-headline,
        #BUTTON_TEXT646>.ladi-headline,
        #BUTTON_TEXT648>.ladi-headline,
        #BUTTON_TEXT1005>.ladi-headline {
            font-size: 14px;
            font-weight: bold;
            line-height: 1.6;
            color: rgb(255, 255, 255);
            text-align: center;
        }

        #SECTION425>.ladi-section-background {
            background-color: rgba(235, 243, 254, 0.5);
            opacity: 0.58;
        }

        #HEADLINE430>.ladi-headline,
        #HEADLINE435>.ladi-headline,
        #HEADLINE440>.ladi-headline,
        #HEADLINE445>.ladi-headline,
        #HEADLINE450>.ladi-headline,
        #HEADLINE455>.ladi-headline {
            font-size: 18px;
            font-weight: bold;
            line-height: 1.2;
            color: rgb(5, 34, 74);
            text-align: left;
        }

        #PARAGRAPH431,
        #PARAGRAPH436,
        #PARAGRAPH441,
        #PARAGRAPH446,
        #PARAGRAPH451,
        #PARAGRAPH456 {
            top: 31px;
        }

        #PARAGRAPH431>.ladi-paragraph,
        #PARAGRAPH436>.ladi-paragraph,
        #PARAGRAPH441>.ladi-paragraph,
        #PARAGRAPH446>.ladi-paragraph,
        #PARAGRAPH451>.ladi-paragraph,
        #PARAGRAPH456>.ladi-paragraph {
            font-family: Roboto, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: rgb(5, 34, 74);
            text-align: justify;
        }

        #BOX432,
        #BOX437,
        #BOX442,
        #BOX447,
        #BOX452,
        #BOX457 {
            height: 40px;
        }

        #BOX432>.ladi-box,
        #BOX437>.ladi-box,
        #BOX442>.ladi-box,
        #BOX447>.ladi-box,
        #BOX452>.ladi-box,
        #BOX457>.ladi-box {
            background-color: rgb(10, 103, 233);
        }

        #HEADLINE433,
        #HEADLINE438,
        #HEADLINE443,
        #HEADLINE448,
        #HEADLINE453,
        #HEADLINE458 {
            top: 4px;
        }

        #HEADLINE433>.ladi-headline,
        #HEADLINE438>.ladi-headline,
        #HEADLINE443>.ladi-headline,
        #HEADLINE448>.ladi-headline,
        #HEADLINE453>.ladi-headline,
        #HEADLINE458>.ladi-headline {
            font-family: "Open Sans", sans-serif;
            font-size: 30px;
            font-weight: bold;
            line-height: 1;
            color: rgb(255, 255, 255);
            text-align: left;
        }

        #HEADLINE427>.ladi-headline {
            font-weight: bold;
            line-height: 1;
            color: rgb(240, 81, 35);
        }

        #HEADLINE1010>.ladi-headline,
        #HEADLINE901>.ladi-headline {
            font-family: Roboto, sans-serif;
            font-weight: bold;
            line-height: 1;
            color: rgb(240, 81, 35);
            text-align: center;
        }

        #IMAGE1011>.ladi-image>.ladi-image-background {
            background-image: url("https://w.ladicdn.com/uploads/images/bfc1d1bf-af34-4fe2-9361-35f7f9120640.png");
        }

        #BOX1019>.ladi-box,
        #BOX1022>.ladi-box,
        #BOX1013>.ladi-box,
        #BOX1016>.ladi-box {
            border-width: 2px;
            border-radius: 200px;
            border-style: solid;
            border-color: rgb(255, 154, 158);
        }

        #BOX1019>.ladi-box {
            box-shadow: rgb(180, 180, 180) -5px 5px 12px 0px;
        }

        #HEADLINE1020>.ladi-headline,
        #HEADLINE1023>.ladi-headline,
        #HEADLINE1014>.ladi-headline,
        #HEADLINE1017>.ladi-headline {
            font-family: Roboto, sans-serif;
            font-size: 16px;
            font-weight: bold;
            color: rgb(0, 0, 0);
            text-align: center;
        }

        #BOX1022>.ladi-box,
        #BOX1013>.ladi-box {
            box-shadow: rgb(158, 158, 158) 5px 5px 12px 0px;
        }

        #BOX1016>.ladi-box {
            box-shadow: rgb(132, 132, 132) -5px 5px 12px 0px;
        }

        #BOX630>.ladi-box,
        #BOX635>.ladi-box,
        #BOX640>.ladi-box {
            background-image: linear-gradient(rgb(255, 255, 255), rgb(17, 10, 92));
            background-color: initial;
            background-size: initial;
            background-origin: initial;
            background-position: initial;
            background-repeat: initial;
            background-attachment: initial;
        }

        #IMAGE636>.ladi-image>.ladi-overlay {
            background-color: rgb(255, 222, 89);
            opacity: 0.03;
        }

        #IMAGE636>.ladi-image>.ladi-image-background {
            background-image: url("https://w.ladicdn.com/s650x500/6232ef8718a18400136ad84f/revit-mep-dscons-20240702080614-mnflb.jpg");
        }

        #IMAGE636>.ladi-image {
            border-width: 1px;
            border-radius: 1px;
            border-style: solid;
            border-color: rgb(110, 110, 110);
            filter: contrast(107%) brightness(103%) saturate(101%);
        }

        #IMAGE641>.ladi-image>.ladi-image-background {
            background-image: url("https://w.ladicdn.com/s650x500/6232ef8718a18400136ad84f/1banner-navisworks-01-20220320085429.png");
        }

        #HEADLINE897>.ladi-headline {
            font-family: "Open Sans", sans-serif;
            font-weight: bold;
            line-height: 1;
            color: rgb(240, 81, 35);
            letter-spacing: 1px;
            text-align: center;
        }

        #HEADLINE898>.ladi-headline {
            font-family: "Open Sans", sans-serif;
            font-size: 14px;
            font-style: italic;
            line-height: 1.2;
            color: rgb(133, 130, 130);
            text-align: center;
        }

        #GROUP1071 {
            width: 328px;
            height: 105px;
        }

        #HEADLINE883 {
            width: 235px;
            top: 0px;
            left: 70px;
        }

        #HEADLINE883>.ladi-headline,
        #HEADLINE865>.ladi-headline,
        #HEADLINE877>.ladi-headline {
            font-family: "Open Sans", sans-serif;
            font-size: 16px;
            font-weight: bold;
            line-height: 1.2;
            color: rgb(99, 90, 90);
            text-align: left;
        }

        #PARAGRAPH884,
        #PARAGRAPH896,
        #PARAGRAPH866,
        #PARAGRAPH878,
        #PARAGRAPH872,
        #PARAGRAPH890,
        #PARAGRAPH906,
        #PARAGRAPH910,
        #PARAGRAPH914,
        #PARAGRAPH923,
        #PARAGRAPH927,
        #PARAGRAPH931 {
            width: 259px;
        }

        #PARAGRAPH884 {
            top: 27px;
            left: 69px;
        }

        #PARAGRAPH884>.ladi-paragraph,
        #PARAGRAPH896>.ladi-paragraph,
        #PARAGRAPH866>.ladi-paragraph,
        #PARAGRAPH878>.ladi-paragraph,
        #PARAGRAPH872>.ladi-paragraph,
        #PARAGRAPH890>.ladi-paragraph {
            font-family: "Open Sans", sans-serif;
            font-size: 14px;
            line-height: 1.4;
            color: rgb(133, 130, 130);
            text-align: justify;
        }

        #GROUP1050,
        #BOX881,
        #GROUP1051,
        #BOX1052,
        #GROUP1054,
        #BOX1055,
        #GROUP1057,
        #BOX1058,
        #GROUP1060,
        #BOX1061,
        #GROUP1063,
        #BOX1064 {
            width: 46.1957px;
            height: 47px;
        }

        #GROUP1050,
        #GROUP1057 {
            top: 1px;
            left: 0px;
        }

        #BOX881>.ladi-box,
        #BOX1052>.ladi-box,
        #BOX1055>.ladi-box,
        #BOX1058>.ladi-box,
        #BOX1061>.ladi-box,
        #BOX1064>.ladi-box {
            border-width: 1px;
            border-radius: 10px;
            background-color: rgb(255, 154, 3);
        }

        #SHAPE882,
        #SHAPE1053,
        #SHAPE1056,
        #SHAPE876,
        #SHAPE1059,
        #SHAPE1062,
        #SHAPE1065 {
            width: 30px;
            height: 30px;
        }

        #SHAPE882,
        #SHAPE1053,
        #SHAPE1056,
        #SHAPE1059,
        #SHAPE1062,
        #SHAPE1065 {
            top: 9px;
            left: 8px;
        }

        #SHAPE882 svg:last-child,
        #SHAPE1053 svg:last-child,
        #SHAPE1056 svg:last-child,
        #SHAPE876 svg:last-child,
        #SHAPE1059 svg:last-child,
        #SHAPE1062 svg:last-child,
        #SHAPE1065 svg:last-child,
        #SHAPE1074 svg:last-child,
        #SHAPE1075 svg:last-child {
            fill: rgb(255, 255, 255);
        }

        #GROUP1067 {
            width: 326px;
            height: 123px;
        }

        #HEADLINE895 {
            width: 245px;
            top: 0px;
            left: 12px;
        }

        #HEADLINE895>.ladi-headline,
        #HEADLINE871>.ladi-headline,
        #HEADLINE889>.ladi-headline {
            font-family: "Open Sans", sans-serif;
            font-size: 16px;
            font-weight: bold;
            line-height: 1.2;
            color: rgb(99, 90, 90);
            text-align: right;
        }

        #PARAGRAPH896,
        #PARAGRAPH872,
        #PARAGRAPH890 {
            top: 25px;
            left: 0px;
        }

        #GROUP1051 {
            top: 0px;
            left: 279.804px;
        }

        #GROUP1069 {
            width: 327.922px;
            height: 104px;
        }

        #HEADLINE865 {
            width: 247px;
            top: 1px;
            left: 68.985px;
        }

        #PARAGRAPH866 {
            top: 26px;
            left: 68.922px;
        }

        #GROUP1070 {
            width: 328.922px;
        }

        #HEADLINE877 {
            width: 249px;
            top: 0px;
            left: 69.985px;
        }

        #PARAGRAPH878 {
            top: 25px;
            left: 69.922px;
        }

        #SHAPE876 {
            top: 23px;
            left: 8.922px;
        }

        #GROUP1068,
        #GROUP1066 {
            width: 327px;
            height: 103px;
        }

        #HEADLINE871 {
            width: 240px;
            top: 0px;
            left: 17px;
        }

        #GROUP1060,
        #GROUP1063 {
            top: 0px;
            left: 280.804px;
        }

        #HEADLINE889 {
            width: 252px;
            top: 0px;
            left: 5px;
        }

        #SHAPE904,
        #SHAPE908,
        #SHAPE912,
        #SHAPE921,
        #SHAPE925,
        #SHAPE929 {
            width: 50px;
            height: 50px;
        }

        #SHAPE904 svg:last-child,
        #SHAPE908 svg:last-child,
        #SHAPE912 svg:last-child,
        #SHAPE921 svg:last-child,
        #SHAPE925 svg:last-child,
        #SHAPE929 svg:last-child {
            fill: rgb(240, 81, 35);
        }

        #HEADLINE905,
        #HEADLINE913 {
            top: 2px;
        }

        #HEADLINE905>.ladi-headline {
            font-family: "Open Sans", sans-serif;
            font-weight: bold;
            line-height: 1.4;
            color: rgb(33, 33, 33);
            text-align: right;
        }

        #PARAGRAPH906,
        #PARAGRAPH914 {
            top: 29px;
        }

        #PARAGRAPH906>.ladi-paragraph,
        #PARAGRAPH910>.ladi-paragraph,
        #PARAGRAPH914>.ladi-paragraph,
        #PARAGRAPH923>.ladi-paragraph,
        #PARAGRAPH927>.ladi-paragraph,
        #PARAGRAPH931>.ladi-paragraph {
            font-family: Roboto, sans-serif;
            line-height: 1.4;
            color: rgb(158, 158, 158);
            text-align: justify;
        }

        #GROUP907 {
            width: 326px;
        }

        #SHAPE908 {
            top: 0px;
            left: 276px;
        }

        #HEADLINE909>.ladi-headline,
        #HEADLINE913>.ladi-headline {
            font-family: "Open Sans", sans-serif;
            font-weight: bold;
            line-height: 1.2;
            color: rgb(33, 33, 33);
            text-align: right;
        }

        #PARAGRAPH910 {
            top: 29px;
            left: 0px;
        }

        #GROUP920 {
            width: 327px;
        }

        #HEADLINE922 {
            width: 229px;
        }

        #HEADLINE922,
        #HEADLINE926,
        #HEADLINE930 {
            left: 66px;
        }

        #HEADLINE922>.ladi-headline,
        #HEADLINE926>.ladi-headline,
        #HEADLINE930>.ladi-headline {
            font-family: "Open Sans", sans-serif;
            font-weight: bold;
            line-height: 1.2;
            color: rgb(33, 33, 33);
            text-align: left;
        }

        #PARAGRAPH923 {
            top: 29px;
            left: 68px;
        }

        #GROUP924 {
            width: 325px;
        }

        #HEADLINE926 {
            width: 237px;
        }

        #PARAGRAPH927,
        #PARAGRAPH931 {
            top: 29px;
            left: 66px;
        }

        #SECTION329>.ladi-section-background,
        #SECTION695>.ladi-section-background {
            background-color: rgb(244, 241, 156);
        }

        #SECTION329>.ladi-section-background {
            opacity: 0.12;
        }

        #BOX1007>.ladi-box {
            background-image: linear-gradient(rgb(253, 251, 251), rgb(22, 99, 199));
            background-color: initial;
            background-size: initial;
            background-origin: initial;
            background-position: initial;
            background-repeat: initial;
            background-attachment: initial;
            -webkit-background-clip: initial;
            opacity: 0.71;
        }

        #HEADLINE331>.ladi-headline {
            font-family: Montserrat, sans-serif;
            font-weight: bold;
            line-height: 1;
            color: rgb(17, 10, 92);
            text-align: center;
        }

        #PARAGRAPH334>.ladi-paragraph {
            font-family: "Open Sans", sans-serif;
            font-size: 16px;
            color: rgb(0, 0, 0);
            text-align: center;
        }

        #SECTION695>.ladi-section-background {
            opacity: 0.08;
        }

        #BOX739>.ladi-box,
        #BOX745>.ladi-box,
        #BOX757>.ladi-box {
            border-radius: 100px;
            background-color: rgb(48, 202, 232);
        }

        #HEADLINE740>.ladi-headline,
        #HEADLINE746>.ladi-headline,
        #HEADLINE758>.ladi-headline {
            font-family: "Open Sans", sans-serif;
            font-size: 24px;
            line-height: 1.2;
            color: rgb(255, 255, 255);
            text-align: center;
        }

        #HEADLINE741>.ladi-headline,
        #HEADLINE747>.ladi-headline {
            font-family: "Open Sans", sans-serif;
            line-height: 1.4;
            color: rgb(0, 0, 0);
            text-align: justify;
        }

        #GROUP756,
        #BOX757 {
            height: 42px;
        }

        #HEADLINE758 {
            top: 6px;
        }

        #HEADLINE759>.ladi-headline {
            font-family: "Open Sans", sans-serif;
            line-height: 1.4;
            color: rgb(0, 0, 0);
        }

        #HEADLINE769>.ladi-headline {
            font-family: "Open Sans", sans-serif;
            font-weight: bold;
            color: rgb(240, 81, 35);
            text-align: left;
        }

        #SECTION1073>.ladi-section-background {
            background-color: rgb(31, 33, 41);
        }

        #SHAPE1076 svg:last-child,
        #SHAPE1078 svg:last-child,
        #SHAPE1079 svg:last-child {
            fill: rgb(158, 158, 158);
        }

        #HEADLINE1077 {
            width: 193px;
        }

        #HEADLINE1077>.ladi-headline,
        #HEADLINE1080>.ladi-headline,
        #HEADLINE1083>.ladi-headline,
        #HEADLINE1084>.ladi-headline {
            font-family: "Open Sans", sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: rgb(158, 158, 158);
            text-align: left;
        }

        #HEADLINE1080 {
            width: 132px;
        }

        #HEADLINE1081 {
            left: 7px;
        }

        #HEADLINE1081>.ladi-headline {
            font-family: "Open Sans", sans-serif;
            font-size: 21px;
            line-height: 1.2;
            color: rgb(158, 158, 158);
            text-align: left;
        }

        #HEADLINE1082 {
            width: 399px;
        }

        #HEADLINE1082>.ladi-headline {
            font-family: "Open Sans", sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: rgb(158, 158, 158);
            text-align: left;
        }

        #HEADLINE1083 {
            width: 214px;
        }

        #LINE1085>.ladi-line>.ladi-line-container {
            border-top: 1px solid rgba(255, 255, 255, 0.18);
            border-right: 1px solid rgba(255, 255, 255, 0.18);
            border-bottom: 1px solid rgba(255, 255, 255, 0.18);
            border-left: 0px !important;
        }

        #LINE1085>.ladi-line {
            width: 100%;
            padding: 8px 0px;
        }

        @media (min-width: 768px) {
            #SECTION285 {
                height: 371px;
            }

            #SECTION285>.ladi-section-background {
                background-image: url("https://w.ladicdn.com/s1440x371/6232ef8718a18400136ad84f/p92fapky20220319064313.jpg");
            }

            #SECTION289 {
                height: 444px;
            }

            #HEADLINE291 {
                width: 806px;
                top: 31px;
                left: 77px;
            }

            #HEADLINE291>.ladi-headline {
                font-size: 36px;
                line-height: 1;
                text-align: left;
            }

            #PARAGRAPH292,
            #PARAGRAPH1032 {
                width: 391px;
            }

            #PARAGRAPH292 {
                top: 113px;
                left: 567px;
            }

            #PARAGRAPH292>.ladi-paragraph,
            #PARAGRAPH1032>.ladi-paragraph {
                font-size: 14px;
                line-height: 1.4;
            }

            #VIDEO424 {
                width: 543.89px;
                height: 295.5px;
                top: 104px;
                left: 0px;
            }

            #SHAPE424 {
                top: 117.75px;
                left: 241.945px;
            }

            #PARAGRAPH1032 {
                top: 195.5px;
                left: 567px;
            }

            #BUTTON1039 {
                width: 303.154px;
                top: 285.5px;
                left: 657px;
            }

            #BUTTON_TEXT1039,
            #BUTTON_TEXT1041,
            #BUTTON_TEXT1043 {
                width: 302px;
            }

            #BUTTON_TEXT1039>.ladi-headline,
            #BUTTON_TEXT1041>.ladi-headline,
            #BUTTON_TEXT1043>.ladi-headline,
            #BUTTON_TEXT1028>.ladi-headline {
                font-size: 13px;
            }

            #BUTTON1041 {
                width: 303.462px;
                top: 322.5px;
                left: 657px;
            }

            #BUTTON1043 {
                width: 303.846px;
                top: 359.5px;
                left: 657px;
            }

            #GROUP1046 {
                width: 90px;
                height: 103px;
                top: 285.5px;
                left: 567px;
            }

            #BUTTON1027 {
                width: 90px;
            }

            #BUTTON_TEXT1027,
            #BUTTON_TEXT1028,
            #BUTTON_TEXT1030 {
                width: 94px;
            }

            #BUTTON_TEXT1027>.ladi-headline,
            #BUTTON_TEXT1030>.ladi-headline {
                font-size: 13px;
                text-align: center;
            }

            #BUTTON1028,
            #BUTTON1030 {
                width: 89px;
            }

            #BUTTON1028 {
                top: 37px;
                left: 1px;
            }

            #BUTTON1030 {
                top: 74px;
                left: 1px;
            }

            #SECTION459 {
                height: 59px;
            }

            #HEADLINE460 {
                width: 623px;
                top: 6px;
                left: 143px;
            }

            #HEADLINE460>.ladi-headline,
            #HEADLINE465>.ladi-headline,
            #HEADLINE515>.ladi-headline {
                font-size: 33px;
            }

            #SECTION295,
            #SECTION628 {
                height: 489.094px;
            }

            #GROUP421,
            #BOX296,
            #GROUP422,
            #BOX310,
            #BOX314,
            #GROUP629,
            #BOX630,
            #GROUP634,
            #BOX635,
            #BOX640 {
                width: 307px;
                height: 434.183px;
            }

            #GROUP421,
            #GROUP629 {
                top: 54.9109px;
                left: -1px;
            }

            #IMAGE299,
            #IMAGE299>.ladi-image>.ladi-image-background,
            #IMAGE631,
            #IMAGE631>.ladi-image>.ladi-image-background {
                width: 306px;
                height: 169.693px;
            }

            #IMAGE299,
            #IMAGE315,
            #IMAGE631,
            #IMAGE641 {
                left: 1px;
            }

            #IMAGE299>.ladi-image>.ladi-image-background {
                background-image: url("https://w.ladicdn.com/s650x500/6232ef8718a18400136ad84f/1banner-dung-hinh-revit-mep-01-20220319081110.png");
            }

            #HEADLINE298,
            #HEADLINE632 {
                width: 237px;
                top: 196.161px;
                left: 33px;
            }

            #HEADLINE298>.ladi-headline,
            #HEADLINE312>.ladi-headline,
            #HEADLINE316>.ladi-headline,
            #HEADLINE632>.ladi-headline,
            #HEADLINE637>.ladi-headline,
            #HEADLINE642>.ladi-headline {
                font-size: 18px;
                line-height: 1.2;
            }

            #PARAGRAPH297,
            #PARAGRAPH633 {
                width: 241px;
                top: 253.673px;
                left: 33.5px;
            }

            #PARAGRAPH297>.ladi-paragraph,
            #PARAGRAPH313>.ladi-paragraph,
            #PARAGRAPH317>.ladi-paragraph,
            #PARAGRAPH633>.ladi-paragraph,
            #PARAGRAPH638>.ladi-paragraph,
            #PARAGRAPH643>.ladi-paragraph,
            #HEADLINE905>.ladi-headline,
            #PARAGRAPH906>.ladi-paragraph,
            #HEADLINE909>.ladi-headline,
            #PARAGRAPH910>.ladi-paragraph,
            #HEADLINE913>.ladi-headline,
            #PARAGRAPH914>.ladi-paragraph,
            #HEADLINE922>.ladi-headline,
            #PARAGRAPH923>.ladi-paragraph,
            #HEADLINE926>.ladi-headline,
            #PARAGRAPH927>.ladi-paragraph,
            #HEADLINE930>.ladi-headline,
            #PARAGRAPH931>.ladi-paragraph {
                font-size: 15px;
            }

            #GROUP422,
            #GROUP634 {
                top: 54.9109px;
                left: 326px;
            }

            #IMAGE311,
            #IMAGE311>.ladi-image>.ladi-image-background,
            #IMAGE636,
            #IMAGE636>.ladi-image>.ladi-image-background {
                width: 307px;
                height: 170.404px;
            }

            #IMAGE311,
            #IMAGE636,
            #GROUP738,
            #GROUP744,
            #GROUP756,
            #LINE1085 {
                top: 0px;
            }

            #IMAGE311>.ladi-image>.ladi-image-background {
                background-image: url("https://w.ladicdn.com/s650x500/6232ef8718a18400136ad84f/1banner-boc-tach-khoi-luong-01-20220319081109.png");
            }

            #HEADLINE312,
            #HEADLINE637 {
                width: 263px;
                top: 195.591px;
                left: 22.5px;
            }

            #PARAGRAPH313 {
                width: 232px;
                top: 257.797px;
                left: 38px;
            }

            #GROUP423,
            #GROUP639 {
                width: 307.846px;
                height: 434.183px;
                top: 54.9109px;
                left: 652.154px;
            }

            #IMAGE315,
            #IMAGE315>.ladi-image>.ladi-image-background,
            #IMAGE641,
            #IMAGE641>.ladi-image>.ladi-image-background {
                width: 306.846px;
                height: 171.584px;
            }

            #IMAGE315>.ladi-image>.ladi-image-background {
                background-image: url("https://w.ladicdn.com/s650x500/6232ef8718a18400136ad84f/1banner-family-mep-01-20220319081108.png");
            }

            #HEADLINE316,
            #HEADLINE913 {
                width: 282px;
            }

            #HEADLINE316,
            #HEADLINE642 {
                top: 195.591px;
                left: 17.423px;
            }

            #PARAGRAPH317,
            #PARAGRAPH643 {
                width: 239px;
                top: 256.178px;
                left: 34.923px;
            }

            #BUTTON530,
            #BUTTON644 {
                top: 412.079px;
                left: 72.5px;
            }

            #BUTTON531,
            #BUTTON532,
            #BUTTON646,
            #BUTTON648,
            #BUTTON1005 {
                height: 38.9402px;
            }

            #BUTTON531,
            #BUTTON646 {
                top: 412.079px;
                left: 400px;
            }

            #BUTTON532,
            #BUTTON648 {
                top: 412.079px;
                left: 726.077px;
            }

            #SECTION425 {
                height: 483px;
            }

            #GROUP429,
            #GROUP434,
            #GROUP439 {
                width: 428.951px;
                height: 98px;
            }

            #GROUP429 {
                top: 105px;
                left: 531px;
            }

            #HEADLINE430,
            #HEADLINE435,
            #HEADLINE440 {
                width: 352px;
            }

            #HEADLINE430,
            #PARAGRAPH431,
            #HEADLINE435,
            #PARAGRAPH436,
            #HEADLINE440,
            #PARAGRAPH441 {
                left: 54.9506px;
            }

            #PARAGRAPH431,
            #PARAGRAPH436,
            #PARAGRAPH441,
            #PARAGRAPH446 {
                width: 374px;
            }

            #BOX432,
            #BOX437,
            #BOX442 {
                width: 38.5618px;
            }

            #HEADLINE433,
            #HEADLINE438,
            #HEADLINE443,
            #HEADLINE453 {
                width: 18px;
            }

            #HEADLINE433,
            #HEADLINE438,
            #HEADLINE443 {
                left: 11.5685px;
            }

            #GROUP434 {
                top: 233.5px;
                left: 531px;
            }

            #GROUP439 {
                top: 362px;
                left: 531px;
            }

            #GROUP444 {
                width: 431px;
                height: 98px;
                top: 105px;
                left: 0px;
            }

            #HEADLINE445 {
                width: 365px;
            }

            #HEADLINE445,
            #PARAGRAPH446,
            #HEADLINE455,
            #PARAGRAPH456 {
                left: 57px;
            }

            #BOX447,
            #BOX457 {
                width: 40px;
            }

            #HEADLINE448,
            #HEADLINE458 {
                width: 19px;
                left: 12px;
            }

            #GROUP449 {
                width: 430.207px;
                height: 98px;
                top: 233.5px;
                left: 0px;
            }

            #HEADLINE450 {
                width: 353px;
            }

            #HEADLINE450,
            #PARAGRAPH451 {
                left: 55.2068px;
            }

            #PARAGRAPH451 {
                width: 375px;
            }

            #BOX452 {
                width: 38.7416px;
            }

            #HEADLINE453 {
                left: 11.6225px;
            }

            #GROUP454 {
                width: 501px;
                height: 98px;
                top: 362px;
                left: 0px;
            }

            #HEADLINE455 {
                width: 444px;
            }

            #PARAGRAPH456 {
                width: 377px;
            }

            #HEADLINE427 {
                width: 345px;
                top: 31px;
                left: 307.5px;
            }

            #HEADLINE427>.ladi-headline {
                font-size: 30px;
                text-align: left;
            }

            #SECTION1009 {
                height: 576px;
            }

            #HEADLINE1010 {
                width: 644px;
                top: 36px;
                left: 168px;
            }

            #HEADLINE1010>.ladi-headline,
            #HEADLINE897>.ladi-headline,
            #HEADLINE901>.ladi-headline {
                font-size: 30px;
            }

            #IMAGE1011 {
                width: 298px;
                height: 474px;
                top: 102px;
                left: 362px;
            }

            #IMAGE1011>.ladi-image>.ladi-image-background {
                width: 336.361px;
                height: 474px;
                left: -19.1804px;
            }

            #GROUP1018,
            #BOX1019,
            #GROUP1021,
            #BOX1022,
            #GROUP1012,
            #BOX1013,
            #GROUP1015,
            #BOX1016 {
                width: 202px;
                height: 202px;
            }

            #GROUP1018 {
                top: 143px;
                left: 633px;
            }

            #HEADLINE1020 {
                width: 165px;
                top: 45px;
                left: 18.5px;
            }

            #HEADLINE1020>.ladi-headline,
            #HEADLINE1023>.ladi-headline,
            #HEADLINE1014>.ladi-headline,
            #HEADLINE1017>.ladi-headline,
            #PARAGRAPH334>.ladi-paragraph {
                line-height: 1.4;
            }

            #GROUP1021 {
                top: 140px;
                left: 124px;
            }

            #HEADLINE1023,
            #HEADLINE1014 {
                width: 160px;
                top: 45px;
                left: 21px;
            }

            #GROUP1012 {
                top: 330px;
                left: 0px;
            }

            #GROUP1015 {
                top: 336px;
                left: 758px;
            }

            #HEADLINE1017 {
                width: 164px;
                top: 34px;
                left: 19px;
            }

            #SECTION464,
            #SECTION514 {
                height: 65px;
            }

            #HEADLINE465,
            #HEADLINE515 {
                width: 768px;
                top: 6px;
                left: 107px;
            }

            #IMAGE631>.ladi-image>.ladi-image-background {
                background-image: url("https://w.ladicdn.com/s650x500/6232ef8718a18400136ad84f/combine-revit-mep-20220320085427.jpg");
            }

            #PARAGRAPH638 {
                width: 259px;
                top: 257.797px;
                left: 27.5px;
            }

            #HEADLINE642 {
                width: 274px;
            }

            #SECTION860 {
                height: 553px;
            }

            #HEADLINE897,
            #HEADLINE901 {
                width: 571px;
            }

            #HEADLINE897 {
                top: 37px;
                left: 212.5px;
            }

            #HEADLINE898 {
                width: 500px;
                top: 85px;
                left: 232.5px;
            }

            #IMAGE899 {
                width: 206.734px;
                height: 435px;
                top: 104px;
                left: 379px;
            }

            #IMAGE899>.ladi-image>.ladi-image-background {
                width: 208.466px;
                height: 435px;
                left: -0.866039px;
                background-image: url("https://w.ladicdn.com/s550x750/6232ef8718a18400136ad84f/cover-revit-mep-lo-trinh-20220319081111.jpg");
            }

            #GROUP1071 {
                top: 140px;
                left: 633px;
            }

            #GROUP1067 {
                top: 269px;
                left: 0px;
            }

            #GROUP1069 {
                top: 424px;
                left: 633px;
            }

            #GROUP1070 {
                height: 123px;
                top: 268px;
                left: 633px;
            }

            #GROUP1068 {
                top: 430px;
                left: -1px;
            }

            #GROUP1066 {
                top: 140px;
                left: -1px;
            }

            #SECTION900 {
                height: 496px;
            }

            #HEADLINE901 {
                top: 17px;
                left: 196.867px;
            }

            #GROUP902 {
                width: 348px;
                height: 331px;
                top: 98px;
                left: -11px;
            }

            #GROUP903 {
                width: 336px;
                height: 113px;
                left: 11px;
            }

            #SHAPE904 {
                left: 286px;
            }

            #HEADLINE905 {
                width: 267px;
            }

            #HEADLINE905,
            #HEADLINE913,
            #GROUP920 {
                left: 0px;
            }

            #PARAGRAPH906 {
                left: 10px;
            }

            #GROUP907 {
                height: 92px;
                top: 119px;
                left: 21.5px;
            }

            #HEADLINE909 {
                width: 248px;
                top: 6px;
                left: 9px;
            }

            #GROUP911 {
                width: 348px;
                height: 92px;
                top: 239px;
                left: 0px;
            }

            #SHAPE912 {
                left: 298px;
            }

            #PARAGRAPH914 {
                left: 22px;
            }

            #GROUP919 {
                width: 337px;
                height: 331px;
                top: 97px;
                left: 623px;
            }

            #GROUP920,
            #GROUP924 {
                height: 113px;
            }

            #HEADLINE922,
            #HEADLINE930 {
                top: 5px;
            }

            #GROUP924 {
                top: 113.5px;
                left: 2px;
            }

            #HEADLINE926 {
                top: 6px;
            }

            #GROUP928 {
                width: 336px;
                height: 92px;
                top: 239px;
                left: 1px;
            }

            #HEADLINE930 {
                width: 270px;
            }

            #IMAGE936 {
                width: 233.375px;
                height: 343px;
                top: 98px;
                left: 363.313px;
            }

            #IMAGE936>.ladi-image>.ladi-image-background {
                width: 233.575px;
                height: 343px;
                left: -0.200282px;
                background-image: url("https://w.ladicdn.com/s550x650/6232ef8718a18400136ad84f/ai-nen-hoc-20220320103713.jpg");
            }

            #SECTION329 {
                height: 298.694px;
            }

            #BOX1007 {
                width: 960px;
                height: 253.694px;
            }

            #BOX1007,
            #IMAGE330 {
                top: 44.998px;
                left: 0px;
            }

            #IMAGE330,
            #IMAGE330>.ladi-image>.ladi-image-background {
                width: 449.178px;
                height: 253.694px;
            }

            #IMAGE330>.ladi-image>.ladi-image-background {
                background-image: url("https://w.ladicdn.com/s750x600/6232ef8718a18400136ad84f/banner-suc-manh-cua-dynamo-01-20220320085428.png");
            }

            #HEADLINE331 {
                width: 459px;
                top: 72.092px;
                left: 493.5px;
            }

            #HEADLINE331>.ladi-headline {
                font-size: 27px;
            }

            #PARAGRAPH334 {
                width: 411px;
                top: 149.345px;
                left: 517.5px;
            }

            #BUTTON1005 {
                top: 224.078px;
                left: 643px;
            }

            #SECTION695 {
                height: 321px;
            }

            #GROUP735 {
                width: 822.895px;
                height: 234px;
                top: 37.9688px;
                left: 64.6681px;
            }

            #GROUP736 {
                width: 817.64px;
                height: 48px;
                top: 58.0004px;
            }

            #GROUP738,
            #BOX739 {
                width: 63.2446px;
                height: 42px;
            }

            #HEADLINE740 {
                width: 62px;
                top: 6px;
                left: 0.31486px;
            }

            #HEADLINE741,
            #HEADLINE759 {
                width: 717px;
            }

            #HEADLINE741 {
                top: 3px;
                left: 100.64px;
            }

            #HEADLINE741>.ladi-headline,
            #HEADLINE747>.ladi-headline {
                font-size: 16px;
            }

            #GROUP742 {
                width: 820.396px;
                height: 45px;
                top: 124.5px;
                left: 0.833px;
            }

            #GROUP744,
            #BOX745 {
                width: 62.3383px;
                height: 42px;
            }

            #HEADLINE746,
            #HEADLINE758 {
                width: 49px;
            }

            #HEADLINE746 {
                top: 6px;
                left: 7.42125px;
            }

            #HEADLINE747 {
                width: 719px;
                left: 101.396px;
            }

            #GROUP754 {
                width: 822.062px;
                height: 45px;
                top: 189px;
                left: 0.833px;
            }

            #GROUP756,
            #BOX757 {
                width: 62.6064px;
            }

            #HEADLINE758 {
                left: 7.45316px;
            }

            #HEADLINE759 {
                left: 105.062px;
            }

            #HEADLINE759>.ladi-headline {
                font-size: 16px;
                text-align: left;
            }

            #HEADLINE769 {
                width: 628px;
                left: 139.202px;
            }

            #HEADLINE769>.ladi-headline {
                font-size: 29px;
                line-height: 1.2;
            }

            #SECTION1073 {
                height: 158.906px;
            }

            #SHAPE1074 {
                width: 25.0797px;
                height: 25.0797px;
                top: 103.843px;
                left: 516.766px;
            }

            #SHAPE1075 {
                width: 29.8457px;
                height: 29.8457px;
                top: 100.077px;
                left: 733px;
            }

            #SHAPE1076 {
                width: 26.0565px;
                height: 29.6907px;
                top: 64.342px;
                left: 7px;
            }

            #HEADLINE1077 {
                top: 103.842px;
                left: 42px;
            }

            #SHAPE1078 {
                width: 24.4373px;
                height: 27.8457px;
                top: 103.843px;
                left: 291.119px;
            }

            #SHAPE1079 {
                width: 25.1403px;
                height: 28.6467px;
                top: 100.077px;
                left: 7.91621px;
            }

            #HEADLINE1080 {
                top: 104.843px;
                left: 321.5px;
            }

            #HEADLINE1081 {
                width: 430px;
                top: 26px;
            }

            #HEADLINE1082 {
                top: 67.5px;
                left: 42px;
            }

            #HEADLINE1083 {
                top: 104.843px;
                left: 548.846px;
            }

            #HEADLINE1084 {
                width: 179px;
                top: 103.843px;
                left: 768px;
            }

            #LINE1085 {
                width: 960px;
            }
        }

        @media (max-width: 767px) {
            #SECTION285 {
                height: 300.125px;
            }

            #SECTION285>.ladi-section-background {
                background-image: url("https://w.ladicdn.com/s768x300/6232ef8718a18400136ad84f/p92fapky20220319064313.jpg");
            }

            #SECTION289 {
                height: 708px;
            }

            #HEADLINE291 {
                width: 388px;
            }

            #HEADLINE291,
            #HEADLINE460 {
                top: 15px;
                left: 18.5px;
            }

            #HEADLINE291>.ladi-headline {
                font-size: 26px;
                line-height: 1.4;
                text-align: center;
            }

            #PARAGRAPH292,
            #PARAGRAPH1032,
            #HEADLINE460 {
                width: 378px;
            }

            #PARAGRAPH292 {
                top: 337px;
                left: 22.5px;
            }

            #PARAGRAPH292>.ladi-paragraph,
            #PARAGRAPH1032>.ladi-paragraph {
                font-size: 15px;
                line-height: 1.2;
            }

            #VIDEO424 {
                width: 400px;
                height: 222px;
                top: 96px;
                left: 8.5px;
            }

            #SHAPE424 {
                top: 81px;
                left: 170px;
            }

            #PARAGRAPH1032 {
                top: 425px;
                left: 22.5px;
            }

            #BUTTON1039,
            #BUTTON1041,
            #BUTTON1043,
            #PARAGRAPH431 {
                width: 302px;
            }

            #BUTTON1039 {
                top: 536px;
                left: 107.5px;
            }

            #BUTTON_TEXT1039 {
                width: 303px;
            }

            #BUTTON_TEXT1039>.ladi-headline,
            #BUTTON_TEXT1041>.ladi-headline,
            #BUTTON_TEXT1043>.ladi-headline,
            #BUTTON_TEXT1027>.ladi-headline,
            #BUTTON_TEXT1028>.ladi-headline,
            #BUTTON_TEXT1030>.ladi-headline,
            #PARAGRAPH297>.ladi-paragraph,
            #PARAGRAPH313>.ladi-paragraph,
            #PARAGRAPH317>.ladi-paragraph,
            #PARAGRAPH633>.ladi-paragraph,
            #PARAGRAPH638>.ladi-paragraph,
            #PARAGRAPH643>.ladi-paragraph,
            #HEADLINE905>.ladi-headline,
            #PARAGRAPH906>.ladi-paragraph,
            #HEADLINE909>.ladi-headline,
            #PARAGRAPH910>.ladi-paragraph,
            #HEADLINE913>.ladi-headline,
            #PARAGRAPH914>.ladi-paragraph,
            #HEADLINE922>.ladi-headline,
            #PARAGRAPH923>.ladi-paragraph,
            #HEADLINE926>.ladi-headline,
            #PARAGRAPH927>.ladi-paragraph,
            #HEADLINE930>.ladi-headline,
            #PARAGRAPH931>.ladi-paragraph,
            #HEADLINE741>.ladi-headline,
            #HEADLINE747>.ladi-headline {
                font-size: 14px;
            }

            #BUTTON1041 {
                top: 580px;
                left: 107.5px;
            }

            #BUTTON_TEXT1041,
            #BUTTON_TEXT1043 {
                width: 304px;
            }

            #BUTTON1043 {
                top: 626px;
                left: 107.5px;
            }

            #GROUP1046 {
                width: 94px;
                height: 119px;
                top: 536px;
                left: 13.5px;
            }

            #BUTTON1027,
            #BUTTON1028,
            #BUTTON1030 {
                width: 94px;
            }

            #BUTTON_TEXT1027 {
                width: 90px;
            }

            #BUTTON1028 {
                top: 44px;
                left: 0px;
            }

            #BUTTON_TEXT1028,
            #BUTTON_TEXT1030 {
                width: 89px;
            }

            #BUTTON1030 {
                top: 90px;
                left: 0px;
            }

            #SECTION459,
            #SECTION514 {
                height: 68px;
            }

            #HEADLINE460>.ladi-headline,
            #HEADLINE465>.ladi-headline {
                font-size: 25px;
            }

            #SECTION295 {
                height: 1579px;
            }

            #GROUP421,
            #BOX296 {
                width: 348.544px;
                height: 495px;
            }

            #GROUP421 {
                top: 36px;
                left: 34.5265px;
            }

            #IMAGE299 {
                width: 347.409px;
                height: 233.579px;
                left: 1.13532px;
            }

            #IMAGE299>.ladi-image>.ladi-image-background {
                width: 347.409px;
                height: 242.662px;
                background-image: url("https://w.ladicdn.com/s650x550/6232ef8718a18400136ad84f/1banner-dung-hinh-revit-mep-01-20220319081110.png");
            }

            #HEADLINE298 {
                width: 289px;
                top: 256.655px;
                left: 29.772px;
            }

            #HEADLINE298>.ladi-headline,
            #HEADLINE312>.ladi-headline,
            #HEADLINE316>.ladi-headline,
            #HEADLINE632>.ladi-headline,
            #HEADLINE637>.ladi-headline,
            #HEADLINE642>.ladi-headline {
                font-size: 21px;
                line-height: 1.4;
            }

            #PARAGRAPH297,
            #PARAGRAPH313 {
                width: 293px;
            }

            #PARAGRAPH297 {
                top: 341.726px;
                left: 23.8418px;
            }

            #GROUP422,
            #BOX310 {
                width: 348.544px;
                height: 479.106px;
            }

            #GROUP422 {
                top: 578px;
                left: 34.5265px;
            }

            #IMAGE311 {
                width: 348.544px;
                height: 205.395px;
                top: 4.54129px;
            }

            #IMAGE311>.ladi-image>.ladi-image-background {
                width: 376.941px;
                height: 213.272px;
                background-image: url("https://w.ladicdn.com/s700x550/6232ef8718a18400136ad84f/1banner-boc-tach-khoi-luong-01-20220319081109.png");
            }

            #HEADLINE312 {
                width: 308px;
                top: 230.78px;
                left: 20.4358px;
            }

            #PARAGRAPH313 {
                top: 322.24px;
                left: 27.8154px;
            }

            #GROUP423 {
                width: 350.189px;
                height: 448.212px;
                top: 1108px;
                left: 34.5265px;
            }

            #BOX314 {
                width: 350.129px;
                height: 448.212px;
            }

            #IMAGE315,
            #IMAGE315>.ladi-image>.ladi-image-background {
                width: 349.049px;
                height: 200.326px;
            }

            #IMAGE315 {
                left: 1.14049px;
            }

            #IMAGE315>.ladi-image>.ladi-image-background {
                background-image: url("https://w.ladicdn.com/s650x550/6232ef8718a18400136ad84f/1banner-family-mep-01-20220319081108.png");
            }

            #HEADLINE316 {
                width: 325px;
                top: 220.433px;
                left: 13.1719px;
            }

            #PARAGRAPH317 {
                width: 294px;
                top: 302.481px;
                left: 28.6719px;
            }

            #BUTTON530 {
                top: 458px;
                left: 130px;
            }

            #BUTTON531,
            #BUTTON532,
            #BUTTON646,
            #BUTTON648,
            #BUTTON1005 {
                height: 40px;
            }

            #BUTTON531 {
                top: 1484px;
                left: 128.798px;
            }

            #BUTTON532 {
                top: 984px;
                left: 128.798px;
            }

            #SECTION425 {
                height: 971.21px;
            }

            #GROUP429,
            #GROUP444,
            #GROUP449,
            #GROUP454 {
                width: 385.002px;
                height: 121px;
            }

            #GROUP429 {
                top: 531.004px;
                left: 35px;
            }

            #HEADLINE430,
            #HEADLINE435,
            #HEADLINE445,
            #HEADLINE450,
            #HEADLINE455 {
                width: 333px;
            }

            #HEADLINE430,
            #PARAGRAPH431,
            #HEADLINE445,
            #PARAGRAPH446,
            #HEADLINE450,
            #PARAGRAPH451,
            #HEADLINE455,
            #PARAGRAPH456 {
                left: 52.0023px;
            }

            #BOX432,
            #BOX447,
            #BOX452,
            #BOX457 {
                width: 36.4929px;
            }

            #HEADLINE433,
            #HEADLINE438,
            #HEADLINE443,
            #HEADLINE448,
            #HEADLINE453,
            #HEADLINE458 {
                width: 17px;
            }

            #HEADLINE433,
            #HEADLINE448,
            #HEADLINE453,
            #HEADLINE458 {
                left: 10.9479px;
            }

            #GROUP434 {
                width: 385.07px;
                height: 121px;
                top: 679.504px;
                left: 35px;
            }

            #HEADLINE435,
            #PARAGRAPH436 {
                left: 52.0699px;
            }

            #PARAGRAPH436,
            #PARAGRAPH446,
            #PARAGRAPH456 {
                width: 298px;
            }

            #BOX437 {
                width: 36.5403px;
            }

            #HEADLINE438 {
                left: 10.962px;
            }

            #GROUP439 {
                width: 386px;
                height: 121px;
                top: 828.004px;
                left: 35px;
            }

            #HEADLINE440 {
                width: 339px;
                left: 47px;
            }

            #PARAGRAPH441,
            #PARAGRAPH451,
            #HEADLINE637 {
                width: 301px;
            }

            #PARAGRAPH441 {
                left: 52.2049px;
            }

            #BOX442 {
                width: 36.6351px;
            }

            #HEADLINE443 {
                left: 10.9906px;
            }

            #GROUP444 {
                top: 71px;
                left: 35px;
            }

            #GROUP449 {
                top: 226.002px;
                left: 35px;
            }

            #GROUP454 {
                top: 381.004px;
                left: 35px;
            }

            #HEADLINE427 {
                width: 400px;
                top: 22px;
                left: 10px;
            }

            #HEADLINE427>.ladi-headline {
                font-size: 23px;
                text-align: center;
            }

            #SECTION1009 {
                height: 809.004px;
            }

            #HEADLINE1010,
            #HEADLINE898,
            #HEADLINE901,
            #HEADLINE331,
            #PARAGRAPH334 {
                width: 355px;
            }

            #HEADLINE1010 {
                top: 20px;
                left: 32.5px;
            }

            #HEADLINE1010>.ladi-headline,
            #HEADLINE897>.ladi-headline,
            #HEADLINE901>.ladi-headline {
                font-size: 23px;
            }

            #IMAGE1011 {
                width: 187.5px;
                height: 299px;
                top: 63px;
                left: 124.25px;
            }

            #IMAGE1011>.ladi-image>.ladi-image-background {
                width: 212.177px;
                height: 299px;
                left: -12.3385px;
            }

            #GROUP1018,
            #BOX1019,
            #GROUP1021,
            #BOX1022,
            #GROUP1012,
            #BOX1013,
            #GROUP1015,
            #BOX1016 {
                width: 175px;
                height: 175px;
            }

            #GROUP1018 {
                top: 401px;
                left: 223px;
            }

            #HEADLINE1020,
            #HEADLINE1023,
            #HEADLINE1014,
            #HEADLINE1017 {
                width: 139px;
            }

            #HEADLINE1020 {
                top: 29.0445px;
                left: 18px;
            }

            #HEADLINE1020>.ladi-headline,
            #HEADLINE1023>.ladi-headline,
            #HEADLINE1014>.ladi-headline,
            #HEADLINE1017>.ladi-headline,
            #PARAGRAPH334>.ladi-paragraph {
                line-height: 1.2;
            }

            #GROUP1021 {
                top: 401px;
                left: 24px;
            }

            #HEADLINE1023 {
                top: 30px;
                left: 18px;
            }

            #GROUP1012 {
                top: 584px;
                left: 24px;
            }

            #HEADLINE1014 {
                top: 35.2426px;
                left: 18px;
            }

            #GROUP1015 {
                top: 584px;
                left: 223px;
            }

            #HEADLINE1017 {
                top: 28.6435px;
                left: 18px;
            }

            #SECTION464 {
                height: 75px;
            }

            #HEADLINE465,
            #HEADLINE515 {
                width: 395px;
            }

            #HEADLINE465 {
                top: 13px;
                left: 12.5px;
            }

            #SECTION628 {
                height: 1517.09px;
            }

            #GROUP629,
            #BOX630 {
                width: 341.503px;
                height: 485px;
            }

            #GROUP629 {
                top: 37px;
                left: 42.4174px;
            }

            #IMAGE631 {
                width: 340.39px;
                height: 228.86px;
                left: 1.11238px;
            }

            #IMAGE631>.ladi-image>.ladi-image-background {
                width: 340.39px;
                height: 237.759px;
                background-image: url("https://w.ladicdn.com/s650x550/6232ef8718a18400136ad84f/combine-revit-mep-20220320085427.jpg");
            }

            #HEADLINE632 {
                width: 264px;
                top: 252.45px;
                left: 38.9336px;
            }

            #PARAGRAPH633,
            #PARAGRAPH638,
            #PARAGRAPH643 {
                width: 287px;
            }

            #PARAGRAPH633 {
                top: 334.822px;
                left: 23.3601px;
            }

            #GROUP634,
            #BOX635 {
                width: 341.503px;
                height: 469.428px;
            }

            #GROUP634 {
                top: 562px;
                left: 42.4174px;
            }

            #IMAGE636 {
                width: 341.503px;
                height: 187.519px;
                top: 4.44955px;
            }

            #IMAGE636>.ladi-image>.ladi-image-background {
                width: 344.298px;
                height: 194.711px;
            }

            #HEADLINE637 {
                top: 226.119px;
                left: 20.023px;
            }

            #PARAGRAPH638 {
                top: 315.73px;
                left: 27.2535px;
            }

            #GROUP639 {
                width: 341.503px;
                height: 437.093px;
                top: 1080px;
                left: 42.4174px;
            }

            #BOX640 {
                width: 341.444px;
                height: 437.093px;
            }

            #IMAGE641,
            #IMAGE641>.ladi-image>.ladi-image-background {
                width: 340.391px;
                height: 195.356px;
            }

            #IMAGE641 {
                left: 1.1122px;
            }

            #HEADLINE642 {
                width: 314px;
                top: 214.964px;
                left: 12.6488px;
            }

            #PARAGRAPH643 {
                top: 294.978px;
                left: 27.9606px;
            }

            #BUTTON644 {
                top: 449px;
                left: 130.14px;
            }

            #BUTTON646 {
                top: 1443px;
                left: 133.169px;
            }

            #BUTTON648 {
                top: 960px;
                left: 133.169px;
            }

            #SECTION860 {
                height: 1220px;
            }

            #HEADLINE897 {
                width: 420px;
                top: 27px;
                left: 0.0004px;
            }

            #HEADLINE898 {
                top: 60px;
                left: 32.5004px;
            }

            #IMAGE899,
            #IMAGE899>.ladi-image>.ladi-image-background {
                width: 332.194px;
                height: 376px;
            }

            #IMAGE899 {
                top: 91px;
                left: 42.4174px;
            }

            #IMAGE899>.ladi-image>.ladi-image-background,
            #GROUP903,
            #PARAGRAPH906,
            #PARAGRAPH914,
            #HEADLINE769 {
                left: 0px;
            }

            #IMAGE899>.ladi-image>.ladi-image-background {
                background-image: url("https://w.ladicdn.com/s650x700/6232ef8718a18400136ad84f/cover-revit-mep-lo-trinh-20220319081111.jpg");
            }

            #GROUP1071 {
                top: 850px;
                left: 42.4174px;
            }

            #GROUP1067 {
                top: 591px;
                left: 48.2047px;
            }

            #GROUP1069 {
                top: 973px;
                left: 42.4564px;
            }

            #GROUP1070 {
                height: 103px;
                top: 1090px;
                left: 41.4564px;
            }

            #GROUP1068 {
                top: 728px;
                left: 46.5001px;
            }

            #GROUP1066 {
                top: 477px;
                left: 46.5001px;
            }

            #SECTION900 {
                height: 1166px;
            }

            #HEADLINE901 {
                top: 21px;
                left: 33.7045px;
            }

            #GROUP902 {
                width: 326.5px;
                height: 297px;
                top: 509px;
                left: 55.75px;
            }

            #GROUP903,
            #GROUP911 {
                width: 326px;
                height: 88px;
            }

            #SHAPE904,
            #SHAPE912 {
                left: 276px;
            }

            #HEADLINE905,
            #HEADLINE913 {
                width: 250px;
                left: 7px;
            }

            #GROUP907,
            #GROUP920 {
                height: 88px;
            }

            #GROUP907 {
                top: 102px;
                left: 0.5px;
            }

            #HEADLINE909 {
                width: 239px;
                top: 2px;
                left: 18px;
            }

            #GROUP911 {
                top: 209px;
                left: 0.5px;
            }

            #GROUP919 {
                width: 331px;
                height: 308px;
                top: 826px;
                left: 44.5px;
            }

            #GROUP920 {
                left: 4px;
            }

            #HEADLINE922,
            #HEADLINE926,
            #HEADLINE930 {
                top: 0px;
            }

            #GROUP924 {
                height: 127px;
                top: 114px;
                left: 0px;
            }

            #GROUP928 {
                width: 325px;
                height: 88px;
                top: 220px;
                left: 0px;
            }

            #HEADLINE930 {
                width: 259px;
            }

            #IMAGE936 {
                width: 320.347px;
                height: 396px;
                top: 83px;
                left: 51.031px;
            }

            #IMAGE936>.ladi-image>.ladi-image-background {
                width: 320.552px;
                height: 396px;
                left: -0.204954px;
                background-image: url("https://w.ladicdn.com/s650x700/6232ef8718a18400136ad84f/ai-nen-hoc-20220320103713.jpg");
            }

            #HEADLINE515 {
                top: 15.5px;
                left: 12.5px;
            }

            #HEADLINE515>.ladi-headline {
                font-size: 24px;
            }

            #SECTION329 {
                height: 466.563px;
            }

            #BOX1007 {
                width: 355px;
                height: 429.563px;
            }

            #BOX1007,
            #IMAGE330 {
                top: 37px;
                left: 33.7045px;
            }

            #IMAGE330,
            #IMAGE330>.ladi-image>.ladi-image-background {
                width: 355px;
                height: 203.562px;
            }

            #IMAGE330>.ladi-image>.ladi-image-background {
                background-image: url("https://w.ladicdn.com/s700x550/6232ef8718a18400136ad84f/banner-suc-manh-cua-dynamo-01-20220320085428.png");
            }

            #HEADLINE331 {
                top: 270.563px;
                left: 37.7045px;
            }

            #HEADLINE331>.ladi-headline {
                font-size: 21px;
            }

            #PARAGRAPH334 {
                top: 331.563px;
                left: 33.7045px;
            }

            #BUTTON1005 {
                top: 407.563px;
                left: 130px;
            }

            #SECTION695 {
                height: 359px;
            }

            #GROUP735 {
                width: 384px;
                height: 277.794px;
                top: 25.7058px;
                left: 21.465px;
            }

            #GROUP736 {
                width: 378.647px;
                height: 59px;
                top: 48.6553px;
            }

            #GROUP738,
            #BOX739 {
                width: 45.4541px;
                height: 42.6111px;
            }

            #GROUP738 {
                top: 7.4629px;
            }

            #HEADLINE740,
            #HEADLINE746 {
                width: 36px;
            }

            #HEADLINE740 {
                top: 6.0873px;
                left: 5.4112px;
            }

            #HEADLINE741 {
                width: 322px;
                top: 0px;
                left: 56.6467px;
            }

            #GROUP742 {
                width: 371.394px;
                height: 78px;
                top: 133.217px;
                left: 0px;
            }

            #GROUP744,
            #BOX745 {
                width: 45.3725px;
                height: 45.2308px;
            }

            #GROUP744 {
                top: 15.1538px;
            }

            #HEADLINE746 {
                top: 6.46154px;
                left: 5.40148px;
            }

            #HEADLINE747 {
                width: 315px;
                left: 56.3945px;
            }

            #GROUP754 {
                width: 373.23px;
                height: 43px;
                top: 234.794px;
                left: 1.91979px;
            }

            #GROUP756,
            #BOX757 {
                width: 42.0965px;
            }

            #GROUP756 {
                top: 1px;
            }

            #HEADLINE758 {
                width: 34px;
                left: 5.01148px;
            }

            #HEADLINE759 {
                width: 320px;
                left: 53.2304px;
            }

            #HEADLINE759>.ladi-headline {
                font-size: 14px;
                text-align: justify;
            }

            #HEADLINE769 {
                width: 384px;
            }

            #HEADLINE769>.ladi-headline {
                font-size: 21px;
                line-height: 1;
            }

            #SECTION1073 {
                height: 192.58px;
            }

            #SHAPE1074 {
                width: 16.7086px;
                height: 18.0173px;
                top: 142.723px;
                left: 8.72687px;
            }

            #SHAPE1075 {
                width: 20.9193px;
                height: 20.9193px;
                top: 138.723px;
                left: 258.57px;
            }

            #SHAPE1076 {
                width: 19.8226px;
                height: 22.5873px;
                top: 78.5px;
                left: 6.5266px;
            }

            #HEADLINE1077 {
                top: 108.842px;
                left: 34px;
            }

            #SHAPE1078 {
                width: 17.2893px;
                height: 19.7007px;
                top: 109.023px;
                left: 260.613px;
            }

            #SHAPE1079 {
                width: 16.3155px;
                height: 17.5874px;
                top: 111.624px;
                left: 8.846px;
            }

            #HEADLINE1080 {
                top: 106.868px;
                left: 283.846px;
            }

            #HEADLINE1081 {
                width: 413px;
                top: 35px;
            }

            #HEADLINE1082 {
                top: 76.5px;
                left: 34px;
            }

            #HEADLINE1083 {
                top: 139.766px;
                left: 33.8465px;
            }

            #HEADLINE1084 {
                width: 130px;
                top: 136.655px;
                left: 285.846px;
            }

            #LINE1085 {
                width: 419px;
                top: 165.69px;
            }
        }
    </style>
</head>

<body data-rsssl="1" class="" data-new-gr-c-s-check-loaded="14.1209.0" data-gr-ext-installed="">
    <svg xmlns="http://www.w3.org/2000/svg"
        style="width: 0px; height: 0px; position: absolute; overflow: hidden; display: none;">
        <symbol id="shape_XlCCXgLStJ" viewBox="0 0 1792 1896.0833">
            <path
                d="M893 0q240-2 451 120 232 134 352 372l-742-39q-160-9-294 74.5T475 757L199 333Q327 174 510 87.5T893 0zM146 405l337 663q72 143 211 217t293 45l-230 451q-212-33-385-157.5t-272.5-316T0 896q0-267 146-491zm1586 169q58 150 59.5 310.5t-48.5 306-153 272-246 209.5q-230 133-498 119l405-623q88-131 82.5-290.5T1227 600zm-836 20q125 0 213.5 88.5T1198 896t-88.5 213.5T896 1198t-213.5-88.5T594 896t88.5-213.5T896 594z">
            </path>
        </symbol>
        <symbol id="shape_koNDUJUknk" viewBox="0 0 24 24">
            <path
                d="M9,5A3.5,3.5 0 0,1 12.5,8.5A3.5,3.5 0 0,1 9,12A3.5,3.5 0 0,1 5.5,8.5A3.5,3.5 0 0,1 9,5M9,13.75C12.87,13.75 16,15.32 16,17.25V19H2V17.25C2,15.32 5.13,13.75 9,13.75M17,12.66L14.25,9.66L15.41,8.5L17,10.09L20.59,6.5L21.75,7.91L17,12.66Z">
            </path>
        </symbol>
    </svg>
    <div class="ladi-wraper">
        <div id="SECTION285" class="ladi-section">
            <div class="ladi-section-background"></div>
            <div class="ladi-container"></div>
        </div>
        <div id="SECTION459" class="ladi-section">
            <div class="ladi-section-background"></div>
            <div class="ladi-container">
                <div id="HEADLINE460" class="ladi-element">
                    <h3 class="ladi-headline ladi-transition">ROADMAP 1: WORK SKILLS<br></h3>
                </div>
            </div>
        </div>
        <div id="SECTION425" class="ladi-section">
            <div class="ladi-section-background"></div>
            <div class="ladi-container">
                <div id="GROUP429" class="ladi-element">
                    <div class="ladi-group">
                        <div id="HEADLINE430" class="ladi-element">
                            <h5 class="ladi-headline ladi-transition">Career Opportunities</h5>
                        </div>
                        <div id="PARAGRAPH431" class="ladi-element">
                            <div class="ladi-paragraph ladi-transition">Job Readiness: Students will be prepared with a strong CV, interview techniques, and a clear understanding of employer expectations.<br></div>
                        </div>
                        <div id="BOX432" class="ladi-element">
                            <div class="ladi-box ladi-transition"></div>
                        </div>
                        <div id="HEADLINE433" class="ladi-element">
                            <h2 class="ladi-headline ladi-transition">4</h2>
                        </div>
                    </div>
                </div>
                <div id="GROUP434" class="ladi-element">
                    <div class="ladi-group">
                        <div id="HEADLINE435" class="ladi-element">
                            <h5 class="ladi-headline ladi-transition">Community Networking</h5>
                        </div>
                        <div id="PARAGRAPH436" class="ladi-element">
                            <div class="ladi-paragraph ladi-transition">Expand Connections: By participating in the course, students will have the chance to meet professionals and peers with similar career goals.</div>
                        </div>
                        <div id="BOX437" class="ladi-element">
                            <div class="ladi-box ladi-transition"></div>
                        </div>
                        <div id="HEADLINE438" class="ladi-element">
                            <h2 class="ladi-headline ladi-transition">5</h2>
                        </div>
                    </div>
                </div>
                <div id="GROUP444" class="ladi-element">
                    <div class="ladi-group">
                        <div id="HEADLINE445" class="ladi-element">
                            <h5 class="ladi-headline ladi-transition">Practical Knowledge</h5>
                        </div>
                        <div id="PARAGRAPH446" class="ladi-element">
                            <div class="ladi-paragraph ladi-transition">Real-World Projects: The course provides opportunities for hands-on practice through real-life assignments or projects, allowing students to immediately apply their knowledge in a work setting.</div>
                        </div>
                        <div id="BOX447" class="ladi-element">
                            <div class="ladi-box ladi-transition"></div>
                        </div>
                        <div id="HEADLINE448" class="ladi-element">
                            <h2 class="ladi-headline ladi-transition">1</h2>
                        </div>
                    </div>
                </div>
                <div id="GROUP449" class="ladi-element">
                    <div class="ladi-group">
                        <div id="HEADLINE450" class="ladi-element">
                            <h5 class="ladi-headline ladi-transition">Specialized Skills</h5>
                        </div>
                        <div id="PARAGRAPH451" class="ladi-element">
                            <div class="ladi-paragraph ladi-transition">Mastering Tools and Technologies: Students will learn to use the tools, programming languages, and processes relevant to their chosen field with proficiency.<br></div>
                        </div>
                        <div id="BOX452" class="ladi-element">
                            <div class="ladi-box ladi-transition"></div>
                        </div>
                        <div id="HEADLINE453" class="ladi-element">
                            <h2 class="ladi-headline ladi-transition">2</h2>
                        </div>
                    </div>
                </div>
                <div id="GROUP454" class="ladi-element">
                    <div class="ladi-group">
                        <div id="HEADLINE455" class="ladi-element">
                            <h5 class="ladi-headline ladi-transition">Soft Skills&nbsp;</h5>
                        </div>
                        <div id="PARAGRAPH456" class="ladi-element">
                            <div class="ladi-paragraph ladi-transition">Effective Communication: Students will learn how to work in teams, communicate with colleagues, and present ideas clearly.<br></div>
                        </div>
                        <div id="BOX457" class="ladi-element">
                            <div class="ladi-box ladi-transition"></div>
                        </div>
                        <div id="HEADLINE458" class="ladi-element">
                            <h2 class="ladi-headline ladi-transition">3</h2>
                        </div>
                    </div>
                </div>
                <div id="HEADLINE1010" class="ladi-element">
                    <h2 class="ladi-headline ladi-transition">BENEFITS FROM ROADMAP 1</h2>
                </div>
            </div>
        </div>
        <div id="SECTION1009" class="ladi-section">
            <div class="ladi-section-background"></div>
            <div class="ladi-container">
                <div id="HEADLINE1010" class="ladi-element">
                    <h2 class="ladi-headline ladi-transition">WHO SHOULD JOIN ROADMAP 1</h2>
                </div>
                <div id="IMAGE1011" class="ladi-element">
                    <div class="ladi-image ladi-transition">
                        <div class="ladi-image-background"></div>
                    </div>
                </div>
                <div id="GROUP1018" class="ladi-element">
                    <div class="ladi-group">
                        <div id="BOX1019" class="ladi-element">
                            <div class="ladi-box ladi-transition"></div>
                        </div>
                        <div id="HEADLINE1020" class="ladi-element">
                            <h6 class="ladi-headline ladi-transition">The subjects are <br>students About to Graduate or Recently Graduated</h6>
                        </div>
                    </div>
                </div>
                <div id="GROUP1021" class="ladi-element">
                    <div class="ladi-group">
                        <div id="BOX1022" class="ladi-element">
                            <div class="ladi-box ladi-transition"></div>
                        </div>
                        <div id="HEADLINE1023" class="ladi-element">
                            <h6 class="ladi-headline ladi-transition">The subjects are <br>individuals Looking to Switch Careers<br></h6>
                        </div>
                    </div>
                </div>
                <div id="GROUP1012" class="ladi-element">
                    <div class="ladi-group">
                        <div id="BOX1013" class="ladi-element">
                            <div class="ladi-box ladi-transition"></div>
                        </div>
                        <div id="HEADLINE1014" class="ladi-element">
                            <h6 class="ladi-headline ladi-transition">The subjects are <br>employees Looking to Enhance Their Professional Skills</h6>
                        </div>
                    </div>
                </div>
                <div id="GROUP1015" class="ladi-element">
                    <div class="ladi-group">
                        <div id="BOX1016" class="ladi-element">
                            <div class="ladi-box ladi-transition"></div>
                        </div>
                        <div id="HEADLINE1017" class="ladi-element">
                            <h6 class="ladi-headline ladi-transition">The subjects are <br>people Passionate About Learning and Self-Development</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="SECTION464" class="ladi-section">
            <div class="ladi-section-background"></div>
            <div class="ladi-container">
                <div id="HEADLINE465" class="ladi-element">
                    <h3 class="ladi-headline ladi-transition">ROADMAP 2: PROFESSIONAL SKILL DEVELOPMENT<br></h3>
                </div>
            </div>
        </div>
        <div id="SECTION860" class="ladi-section">
            <div class="ladi-section-background"></div>
            <div class="ladi-container">
                <div id="HEADLINE897" class="ladi-element">
                    <h3 class="ladi-headline ladi-transition">BENEFITS FROM ROADMAP 2</h3>
                </div>
                <div id="IMAGE899" class="ladi-element">
                    <div class="ladi-image ladi-transition">
                        <div class="ladi-image-background"></div>
                    </div>
                </div>
                <div id="GROUP1071" class="ladi-element">
                    <div class="ladi-group">
                        <div id="HEADLINE883" class="ladi-element">
                            <h6 class="ladi-headline ladi-transition">Practical Knowledge</h6>
                        </div>
                        <div id="PARAGRAPH884" class="ladi-element">
                            <div class="ladi-paragraph ladi-transition">Understanding the Job: Learners will gain knowledge tailored to industry needs, boosting their confidence when entering the workforce.</div>
                        </div>
                        <div id="GROUP1050" class="ladi-element">
                            <div class="ladi-group">
                                <div id="BOX881" class="ladi-element">
                                    <div class="ladi-box ladi-transition"></div>
                                </div>
                                <div id="SHAPE882" class="ladi-element">
                                    <div class="ladi-shape ladi-transition"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="100%" height="100%" preserveAspectRatio="none"
                                            viewBox="0 0 1792 1896.08" class="" fill="rgba(255,255,255,1)">
                                            <use xlink:href="#shape_XlCCXgLStJ"></use>
                                        </svg></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="GROUP1067" class="ladi-element">
                    <div class="ladi-group">
                        <div id="HEADLINE895" class="ladi-element">
                            <h6 class="ladi-headline ladi-transition">Specialized Skills</h6>
                        </div>
                        <div id="PARAGRAPH896" class="ladi-element">
                            <div class="ladi-paragraph ladi-transition">Mastering Tools and Technologies: Learners will be trained to proficiently use the tools, programming languages, or processes relevant to their chosen field.</div>
                        </div>
                        <div id="GROUP1051" class="ladi-element">
                            <div class="ladi-group">
                                <div id="BOX1052" class="ladi-element">
                                    <div class="ladi-box ladi-transition"></div>
                                </div>
                                <div id="SHAPE1053" class="ladi-element">
                                    <div class="ladi-shape ladi-transition"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="100%" height="100%" preserveAspectRatio="none"
                                            viewBox="0 0 1792 1896.08" class="" fill="rgba(255,255,255,1)">
                                            <use xlink:href="#shape_XlCCXgLStJ"></use>
                                        </svg></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="GROUP1066" class="ladi-element">
                    <div class="ladi-group">
                        <div id="HEADLINE865" class="ladi-element">
                            <h6 class="ladi-headline ladi-transition">Career Opportunities</h6>
                        </div>
                        <div id="PARAGRAPH866" class="ladi-element">
                            <div class="ladi-paragraph ladi-transition">Job Preparedness: Learners will be equipped with a quality CV, interview skills, and an understanding of employer expectations.
                            </div>
                        </div>
                        <div id="GROUP1054" class="ladi-element">
                            <div class="ladi-group">
                                <div id="BOX1055" class="ladi-element">
                                    <div class="ladi-box ladi-transition"></div>
                                </div>
                                <div id="SHAPE1056" class="ladi-element">
                                    <div class="ladi-shape ladi-transition"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="100%" height="100%" preserveAspectRatio="none"
                                            viewBox="0 0 1792 1896.08" class="" fill="rgba(255,255,255,1)">
                                            <use xlink:href="#shape_XlCCXgLStJ"></use>
                                        </svg></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="GROUP1070" class="ladi-element">
                    <div class="ladi-group">
                        <div id="HEADLINE877" class="ladi-element">
                            <h6 class="ladi-headline ladi-transition">Networking</h6>
                        </div>
                        <div id="PARAGRAPH878" class="ladi-element">
                            <div class="ladi-paragraph ladi-transition">Post-Course Support: Many courses offer learning communities where learners can continue to receive support after completing the course</div>
                        </div>
                        <div id="SHAPE876" class="ladi-element">
                            <div class="ladi-shape ladi-transition"><svg xmlns="http://www.w3.org/2000/svg" width="100%"
                                    height="100%" preserveAspectRatio="none" viewBox="0 0 1792 1896.08" class=""
                                    fill="rgba(255,255,255,1)">
                                    <use xlink:href="#shape_XlCCXgLStJ"></use>
                                </svg></div>
                        </div>
                        <div id="GROUP1057" class="ladi-element">
                            <div class="ladi-group">
                                <div id="BOX1058" class="ladi-element">
                                    <div class="ladi-box ladi-transition"></div>
                                </div>
                                <div id="SHAPE1059" class="ladi-element">
                                    <div class="ladi-shape ladi-transition"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="100%" height="100%" preserveAspectRatio="none"
                                            viewBox="0 0 1792 1896.08" class="" fill="rgba(255,255,255,1)">
                                            <use xlink:href="#shape_XlCCXgLStJ"></use>
                                        </svg></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="SECTION900" class="ladi-section">
            <div class="ladi-section-background"></div>
            <div class="ladi-container">
                <div id="HEADLINE901" class="ladi-element">
                    <h2 class="ladi-headline ladi-transition">Who Should Join Roadmap 2</h2>
                </div>
                <div id="GROUP902" class="ladi-element">
                    <div class="ladi-group">
                        <div id="GROUP903" class="ladi-element">
                            <div class="ladi-group">
                                <div id="SHAPE904" class="ladi-element">
                                    <div class="ladi-shape ladi-transition"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="100%" height="100%" preserveAspectRatio="none" viewBox="0 0 24 24"
                                            class="" fill="#f05123">
                                            <use xlink:href="#shape_koNDUJUknk"></use>
                                        </svg></div>
                                </div>
                                <div id="HEADLINE905" class="ladi-element">
                                    <p class="ladi-headline ladi-transition">Students Recently Graduated</p>
                                </div>
                                <div id="PARAGRAPH906" class="ladi-element">
                                    <div class="ladi-paragraph ladi-transition">They want to build a strong foundation in professional and soft skills to prepare for their career.</div>
                                </div>
                            </div>
                        </div>
                        <div id="GROUP907" class="ladi-element">
                            <div class="ladi-group">
                                <div id="SHAPE908" class="ladi-element">
                                    <div class="ladi-shape ladi-transition"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="100%" height="100%" preserveAspectRatio="none" viewBox="0 0 24 24"
                                            class="" fill="rgba(240,81,35,1)">
                                            <use xlink:href="#shape_koNDUJUknk"></use>
                                        </svg></div>
                                </div>
                                <div id="HEADLINE909" class="ladi-element">
                                    <h6 class="ladi-headline ladi-transition">Individuals Looking For Careers</h6>
                                </div>
                                <div id="PARAGRAPH910" class="ladi-element">
                                    <div class="ladi-paragraph ladi-transition">People from different fields who wish to transition into a new industry and need thorough training from the ground up.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="GROUP919" class="ladi-element">
                    <div class="ladi-group">
                        <div id="GROUP920" class="ladi-element">
                            <div class="ladi-group">
                                <div id="SHAPE921" class="ladi-element">
                                    <div class="ladi-shape ladi-transition"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="100%" height="100%" preserveAspectRatio="none" viewBox="0 0 24 24"
                                            class="" fill="rgba(240,81,35,1)">
                                            <use xlink:href="#shape_koNDUJUknk"></use>
                                        </svg></div>
                                </div>
                                <div id="HEADLINE922" class="ladi-element">
                                    <h6 class="ladi-headline ladi-transition">People Passionate Learning</h6>
                                </div>
                                <div id="PARAGRAPH923" class="ladi-element">
                                    <div class="ladi-paragraph ladi-transition">Those who are eager to advance their professional skills or explore new career opportunities.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="GROUP924" class="ladi-element">
                            <div class="ladi-group">
                                <div id="SHAPE925" class="ladi-element">
                                    <div class="ladi-shape ladi-transition"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="100%" height="100%" preserveAspectRatio="none" viewBox="0 0 24 24"
                                            class="" fill="rgba(240,81,35,1)">
                                            <use xlink:href="#shape_koNDUJUknk"></use>
                                        </svg></div>
                                </div>
                                <div id="HEADLINE926" class="ladi-element">
                                    <h6 class="ladi-headline ladi-transition">Employees</h6>
                                </div>
                                <div id="PARAGRAPH927" class="ladi-element">
                                    <div class="ladi-paragraph ladi-transition">They wish to update themselves on new technologies, tools, or workflows to improve their careers.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="IMAGE936" class="ladi-element">
                    <div class="ladi-image ladi-transition">
                        <div class="ladi-image-background"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="SECTION514" class="ladi-section">
            <div class="ladi-section-background"></div>
            <div class="ladi-container">
                <div id="HEADLINE515" class="ladi-element">
                    <h3 class="ladi-headline ladi-transition">ROADMAP 3: ADVANCED CAREER DEVELOPMENT<br></h3>
                </div>
            </div>
        </div>
        <div id="SECTION695" class="ladi-section">
            <div class="ladi-section-background"></div>
            <div class="ladi-container">
                <div id="GROUP735" class="ladi-element">
                    <div class="ladi-group">
                        <div id="GROUP736" class="ladi-element">
                            <div class="ladi-group">
                                <div id="GROUP738" class="ladi-element">
                                    <div class="ladi-group">
                                        <div id="BOX739" class="ladi-element">
                                            <div class="ladi-box ladi-transition"></div>
                                        </div>
                                        <div id="HEADLINE740" class="ladi-element">
                                            <h3 class="ladi-headline ladi-transition">1</h3>
                                        </div>
                                    </div>
                                </div>
                                <div id="HEADLINE741" class="ladi-element">
                                    <p class="ladi-headline ladi-transition">In-Depth Understanding: Learners will gain an advanced understanding of industry-specific tools, technologies, and methodologies, preparing them to tackle complex challenges..<br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div id="GROUP742" class="ladi-element">
                            <div class="ladi-group">
                                <div id="GROUP744" class="ladi-element">
                                    <div class="ladi-group">
                                        <div id="BOX745" class="ladi-element">
                                            <div class="ladi-box ladi-transition"></div>
                                        </div>
                                        <div id="HEADLINE746" class="ladi-element">
                                            <h3 class="ladi-headline ladi-transition">2</h3>
                                        </div>
                                    </div>
                                </div>
                                <div id="HEADLINE747" class="ladi-element">
                                    <p class="ladi-headline ladi-transition">Mastery of Advanced Techniques: Learners will acquire advanced knowledge and technical skills, allowing them to excel in specialized areas.<br></p>
                                </div>
                            </div>
                        </div>
                        <div id="GROUP754" class="ladi-element">
                            <div class="ladi-group">
                                <div id="GROUP756" class="ladi-element">
                                    <div class="ladi-group">
                                        <div id="BOX757" class="ladi-element">
                                            <div class="ladi-box ladi-transition"></div>
                                        </div>
                                        <div id="HEADLINE758" class="ladi-element">
                                            <h3 class="ladi-headline ladi-transition">3</h3>
                                        </div>
                                    </div>
                                </div>
                                <div id="HEADLINE759" class="ladi-element">
                                    <p class="ladi-headline ladi-transition">Team Leadership: The course will help learners develop leadership skills, guiding them to effectively manage teams and projects.</p>
                                </div>
                            </div>
                        </div>
                        <div id="HEADLINE769" class="ladi-element">
                            <h4 class="ladi-headline ladi-transition">BENEFITS FROM ROADMAP 3</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="SECTION1073" class="ladi-section">
            <div class="ladi-section-background"></div>
            <div class="ladi-container">
                <div id="SHAPE1074" class="ladi-element">
                    <div class="ladi-shape ladi-transition"><svg xmlns="http://www.w3.org/2000/svg" width="100%"
                            height="100%" preserveAspectRatio="none" viewBox="0 0 1536 1896.0833" class=""
                            fill="rgba(255,255,255,1)">
                            <path
                                d="M1248 128q119 0 203.5 84.5T1536 416v960q0 119-84.5 203.5T1248 1664h-188v-595h199l30-232h-229V689q0-56 23.5-84t91.5-28l122-1V369q-63-9-178-9-136 0-217.5 80T820 666v171H620v232h200v595H288q-119 0-203.5-84.5T0 1376V416q0-119 84.5-203.5T288 128h960z">
                            </path>
                        </svg></div>
                </div>
                <div id="SHAPE1075" class="ladi-element">
                    <div class="ladi-shape ladi-transition"><svg [removed]="" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="100%" height="100%" viewBox="0 0 24 24" fill="rgba(255,255,255,1)">
                            <path
                                d="M10,16.5V7.5L16,12M20,4.4C19.4,4.2 15.7,4 12,4C8.3,4 4.6,4.19 4,4.38C2.44,4.9 2,8.4 2,12C2,15.59 2.44,19.1 4,19.61C4.6,19.81 8.3,20 12,20C15.7,20 19.4,19.81 20,19.61C21.56,19.1 22,15.59 22,12C22,8.4 21.56,4.91 20,4.4Z">
                            </path>
                        </svg></div>
                </div>
                <div id="HEADLINE1077" class="ladi-element">
                    <h1 class="ladi-headline ladi-transition">0974.114.905 - 0961.531.165<br></h1>
                </div>
                <div id="SHAPE1078" class="ladi-element">
                    <div class="ladi-shape ladi-transition"><svg xmlns="http://www.w3.org/2000/svg" width="100%"
                            height="100%" preserveAspectRatio="none" viewBox="0 0 1792 1896.0833" class=""
                            fill="rgba(158, 158, 158, 1)">
                            <path
                                d="M1664 1504V736q-32 36-69 66-268 206-426 338-51 43-83 67t-86.5 48.5T897 1280h-2q-48 0-102.5-24.5T706 1207t-83-67q-158-132-426-338-37-30-69-66v768q0 13 9.5 22.5t22.5 9.5h1472q13 0 22.5-9.5t9.5-22.5zm0-1051v-24.5l-.5-13-3-12.5-5.5-9-9-7.5-14-2.5H160q-13 0-22.5 9.5T128 416q0 168 147 284 193 152 401 317 6 5 35 29.5t46 37.5 44.5 31.5T852 1143t43 9h2q20 0 43-9t50.5-27.5 44.5-31.5 46-37.5 35-29.5q208-165 401-317 54-43 100.5-115.5T1664 453zm128-37v1088q0 66-47 113t-113 47H160q-66 0-113-47T0 1504V416q0-66 47-113t113-47h1472q66 0 113 47t47 113z">
                            </path>
                        </svg></div>
                </div>
                <div id="SHAPE1079" class="ladi-element">
                    <div class="ladi-shape ladi-transition"><svg xmlns="http://www.w3.org/2000/svg" width="100%"
                            height="100%" preserveAspectRatio="none" viewBox="0 0 1536 1896.0833" class=""
                            fill="rgba(158, 158, 158, 1)">
                            <path
                                d="M1280 1193q0-11-2-16-3-8-38.5-29.5T1151 1098l-53-29q-5-3-19-13t-25-15-21-5q-18 0-47 32.5t-57 65.5-44 33q-7 0-16.5-3.5T853 1157t-17-9.5-14-8.5q-99-55-170.5-126.5T525 842q-2-3-8.5-14t-9.5-17-6.5-15.5T497 779q0-13 20.5-33.5t45-38.5 45-39.5T628 631q0-10-5-21t-15-25-13-19q-3-6-15-28.5T555 492t-26.5-47.5-25-40.5-16.5-18-16-2q-48 0-101 22-46 21-80 94.5T256 631q0 16 2.5 34t5 30.5 9 33 10 29.5 12.5 33 11 30q60 164 216.5 320.5T843 1358q6 2 30 11t33 12.5 29.5 10 33 9 30.5 5 34 2.5q57 0 130.5-34t94.5-80q22-53 22-101zm256-777v960q0 119-84.5 203.5T1248 1664H288q-119 0-203.5-84.5T0 1376V416q0-119 84.5-203.5T288 128h960q119 0 203.5 84.5T1536 416z">
                            </path>
                        </svg></div>
                </div>
                <div id="HEADLINE1080" class="ladi-element">
                    <h1 class="ladi-headline ladi-transition">contact@.vn<br></h1>
                </div>

                <a href="https://www.facebook.com/DSCons.VietNam" target="_blank" id="HEADLINE1083"
                    class="ladi-element" rel="noopener noreferrer"
                    data-replace-href="https://www.facebook.com/DSCons.VietNam">
                    <h1 class="ladi-headline ladi-transition">Facebook.com<br></h1>
                </a><a href="https://www.youtube.com/c/DSConsVi%E1%BB%87tNam" target="_blank" id="HEADLINE1084"
                    class="ladi-element" rel="noopener noreferrer"
                    data-replace-href="https://www.youtube.com/c/DSConsVi%E1%BB%87tNam">
                    <h1 class="ladi-headline ladi-transition">Youtube.com<br></h1>
                </a>
                <div id="LINE1085" class="ladi-element">
                    <div class="ladi-line">
                        <div class="ladi-line-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&amp;family=Roboto:wght@400;700&amp;family=Montserrat:wght@400;700&amp;display=swap"
        rel="stylesheet" type="text/css">
    <script src="https://w.ladicdn.com/v4/source/ladipagev3.min.js?v=1719904843439" type="text/javascript"></script>
</body>
</html>