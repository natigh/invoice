<style>
    /*
! tailwindcss v3.3.3 | MIT License | https://tailwindcss.com
*/

/*
1. Prevent padding and border from affecting element width. (https://github.com/mozdevs/cssremedy/issues/4)
2. Allow adding a border to an element by just adding a border-width. (https://github.com/tailwindcss/tailwindcss/pull/116)
*/

*,
::before,
::after {
  box-sizing: border-box;
  /* 1 */
  border-width: 0;
  /* 2 */
  border-style: solid;
  /* 2 */
  border-color: #e5e7eb;
  /* 2 */
}

::before,
::after {
  --tw-content: '';
}

/*
1. Use a consistent sensible line-height in all browsers.
2. Prevent adjustments of font size after orientation changes in iOS.
3. Use a more readable tab size.
4. Use the user's configured `sans` font-family by default.
5. Use the user's configured `sans` font-feature-settings by default.
6. Use the user's configured `sans` font-variation-settings by default.
*/

html {
  line-height: 1.5;
  /* 1 */
  -webkit-text-size-adjust: 100%;
  /* 2 */
  -moz-tab-size: 4;
  /* 3 */
  tab-size: 4;
  /* 3 */
  font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  /* 4 */
  font-feature-settings: normal;
  /* 5 */
  font-variation-settings: normal;
  /* 6 */
}

/*
1. Remove the margin in all browsers.
2. Inherit line-height from `html` so users can set them as a class directly on the `html` element.
*/

body {
  margin: 0;
  /* 1 */
  line-height: inherit;
  /* 2 */
}

/*
1. Add the correct height in Firefox.
2. Correct the inheritance of border color in Firefox. (https://bugzilla.mozilla.org/show_bug.cgi?id=190655)
3. Ensure horizontal rules are visible by default.
*/

hr {
  height: 0;
  /* 1 */
  color: inherit;
  /* 2 */
  border-top-width: 1px;
  /* 3 */
}

/*
Add the correct text decoration in Chrome, Edge, and Safari.
*/

abbr:where([title]) {
  -webkit-text-decoration: underline dotted;
          text-decoration: underline dotted;
}

/*
Remove the default font size and weight for headings.
*/

h1,
h2,
h3,
h4,
h5,
h6 {
  font-size: inherit;
  font-weight: inherit;
}

/*
Reset links to optimize for opt-in styling instead of opt-out.
*/

a {
  color: inherit;
  text-decoration: inherit;
}

/*
Add the correct font weight in Edge and Safari.
*/

b,
strong {
  font-weight: bolder;
}

/*
1. Use the user's configured `mono` font family by default.
2. Correct the odd `em` font sizing in all browsers.
*/

code,
kbd,
samp,
pre {
  font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
  /* 1 */
  font-size: 1em;
  /* 2 */
}

/*
Add the correct font size in all browsers.
*/

small {
  font-size: 80%;
}

/*
Prevent `sub` and `sup` elements from affecting the line height in all browsers.
*/

sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}

sub {
  bottom: -0.25em;
}

sup {
  top: -0.5em;
}

/*
1. Remove text indentation from table contents in Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=999088, https://bugs.webkit.org/show_bug.cgi?id=201297)
2. Correct table border color inheritance in all Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=935729, https://bugs.webkit.org/show_bug.cgi?id=195016)
3. Remove gaps between table borders by default.
*/

table {
  text-indent: 0;
  /* 1 */
  border-color: inherit;
  /* 2 */
  border-collapse: collapse;
  /* 3 */
}

/*
1. Change the font styles in all browsers.
2. Remove the margin in Firefox and Safari.
3. Remove default padding in all browsers.
*/

button,
input,
optgroup,
select,
textarea {
  font-family: inherit;
  /* 1 */
  font-feature-settings: inherit;
  /* 1 */
  font-variation-settings: inherit;
  /* 1 */
  font-size: 100%;
  /* 1 */
  font-weight: inherit;
  /* 1 */
  line-height: inherit;
  /* 1 */
  color: inherit;
  /* 1 */
  margin: 0;
  /* 2 */
  padding: 0;
  /* 3 */
}

/*
Remove the inheritance of text transform in Edge and Firefox.
*/

button,
select {
  text-transform: none;
}

/*
1. Correct the inability to style clickable types in iOS and Safari.
2. Remove default button styles.
*/

button,
[type='button'],
[type='reset'],
[type='submit'] {
  -webkit-appearance: button;
  /* 1 */
  background-color: transparent;
  /* 2 */
  background-image: none;
  /* 2 */
}

/*
Use the modern Firefox focus style for all focusable elements.
*/

:-moz-focusring {
  outline: auto;
}

/*
Remove the additional `:invalid` styles in Firefox. (https://github.com/mozilla/gecko-dev/blob/2f9eacd9d3d995c937b4251a5557d95d494c9be1/layout/style/res/forms.css#L728-L737)
*/

:-moz-ui-invalid {
  box-shadow: none;
}

/*
Add the correct vertical alignment in Chrome and Firefox.
*/

progress {
  vertical-align: baseline;
}

/*
Correct the cursor style of increment and decrement buttons in Safari.
*/

::-webkit-inner-spin-button,
::-webkit-outer-spin-button {
  height: auto;
}

/*
1. Correct the odd appearance in Chrome and Safari.
2. Correct the outline style in Safari.
*/

[type='search'] {
  -webkit-appearance: textfield;
  /* 1 */
  outline-offset: -2px;
  /* 2 */
}

/*
Remove the inner padding in Chrome and Safari on macOS.
*/

::-webkit-search-decoration {
  -webkit-appearance: none;
}

/*
1. Correct the inability to style clickable types in iOS and Safari.
2. Change font properties to `inherit` in Safari.
*/

::-webkit-file-upload-button {
  -webkit-appearance: button;
  /* 1 */
  font: inherit;
  /* 2 */
}

/*
Add the correct display in Chrome and Safari.
*/

summary {
  display: list-item;
}

/*
Removes the default spacing and border for appropriate elements.
*/

blockquote,
dl,
dd,
h1,
h2,
h3,
h4,
h5,
h6,
hr,
figure,
p,
pre {
  margin: 0;
}

fieldset {
  margin: 0;
  padding: 0;
}

legend {
  padding: 0;
}

ol,
ul,
menu {
  list-style: none;
  margin: 0;
  padding: 0;
}

/*
Reset default styling for dialogs.
*/

dialog {
  padding: 0;
}

/*
Prevent resizing textareas horizontally by default.
*/

textarea {
  resize: vertical;
}

/*
1. Reset the default placeholder opacity in Firefox. (https://github.com/tailwindlabs/tailwindcss/issues/3300)
2. Set the default placeholder color to the user's configured gray 400 color.
*/

input::placeholder,
textarea::placeholder {
  opacity: 1;
  /* 1 */
  color: #9ca3af;
  /* 2 */
}

/*
Set the default cursor for buttons.
*/

button,
[role="button"] {
  cursor: pointer;
}

/*
Make sure disabled buttons don't get the pointer cursor.
*/

:disabled {
  cursor: default;
}

/*
1. Make replaced elements `display: block` by default. (https://github.com/mozdevs/cssremedy/issues/14)
2. Add `vertical-align: middle` to align replaced elements more sensibly by default. (https://github.com/jensimmons/cssremedy/issues/14#issuecomment-634934210)
   This can trigger a poorly considered lint error in some tools but is included by design.
*/

img,
svg,
video,
canvas,
audio,
iframe,
embed,
object {
  display: block;
  /* 1 */
  vertical-align: middle;
  /* 2 */
}

/*
Constrain images and videos to the parent width and preserve their intrinsic aspect ratio. (https://github.com/mozdevs/cssremedy/issues/14)
*/

img,
video {
  max-width: 100%;
  height: auto;
}

/* Make elements with the HTML hidden attribute stay hidden by default */

[hidden] {
  display: none;
}

*, ::before, ::after{
  --tw-border-spacing-x: 0;
  --tw-border-spacing-y: 0;
  --tw-translate-x: 0;
  --tw-translate-y: 0;
  --tw-rotate: 0;
  --tw-skew-x: 0;
  --tw-skew-y: 0;
  --tw-scale-x: 1;
  --tw-scale-y: 1;
  --tw-pan-x:  ;
  --tw-pan-y:  ;
  --tw-pinch-zoom:  ;
  --tw-scroll-snap-strictness: proximity;
  --tw-gradient-from-position:  ;
  --tw-gradient-via-position:  ;
  --tw-gradient-to-position:  ;
  --tw-ordinal:  ;
  --tw-slashed-zero:  ;
  --tw-numeric-figure:  ;
  --tw-numeric-spacing:  ;
  --tw-numeric-fraction:  ;
  --tw-ring-inset:  ;
  --tw-ring-offset-width: 0px;
  --tw-ring-offset-color: #fff;
  --tw-ring-color: rgb(59 130 246 / 0.5);
  --tw-ring-offset-shadow: 0 0 #0000;
  --tw-ring-shadow: 0 0 #0000;
  --tw-shadow: 0 0 #0000;
  --tw-shadow-colored: 0 0 #0000;
  --tw-blur:  ;
  --tw-brightness:  ;
  --tw-contrast:  ;
  --tw-grayscale:  ;
  --tw-hue-rotate:  ;
  --tw-invert:  ;
  --tw-saturate:  ;
  --tw-sepia:  ;
  --tw-drop-shadow:  ;
  --tw-backdrop-blur:  ;
  --tw-backdrop-brightness:  ;
  --tw-backdrop-contrast:  ;
  --tw-backdrop-grayscale:  ;
  --tw-backdrop-hue-rotate:  ;
  --tw-backdrop-invert:  ;
  --tw-backdrop-opacity:  ;
  --tw-backdrop-saturate:  ;
  --tw-backdrop-sepia:  ;
}

::backdrop{
  --tw-border-spacing-x: 0;
  --tw-border-spacing-y: 0;
  --tw-translate-x: 0;
  --tw-translate-y: 0;
  --tw-rotate: 0;
  --tw-skew-x: 0;
  --tw-skew-y: 0;
  --tw-scale-x: 1;
  --tw-scale-y: 1;
  --tw-pan-x:  ;
  --tw-pan-y:  ;
  --tw-pinch-zoom:  ;
  --tw-scroll-snap-strictness: proximity;
  --tw-gradient-from-position:  ;
  --tw-gradient-via-position:  ;
  --tw-gradient-to-position:  ;
  --tw-ordinal:  ;
  --tw-slashed-zero:  ;
  --tw-numeric-figure:  ;
  --tw-numeric-spacing:  ;
  --tw-numeric-fraction:  ;
  --tw-ring-inset:  ;
  --tw-ring-offset-width: 0px;
  --tw-ring-offset-color: #fff;
  --tw-ring-color: rgb(59 130 246 / 0.5);
  --tw-ring-offset-shadow: 0 0 #0000;
  --tw-ring-shadow: 0 0 #0000;
  --tw-shadow: 0 0 #0000;
  --tw-shadow-colored: 0 0 #0000;
  --tw-blur:  ;
  --tw-brightness:  ;
  --tw-contrast:  ;
  --tw-grayscale:  ;
  --tw-hue-rotate:  ;
  --tw-invert:  ;
  --tw-saturate:  ;
  --tw-sepia:  ;
  --tw-drop-shadow:  ;
  --tw-backdrop-blur:  ;
  --tw-backdrop-brightness:  ;
  --tw-backdrop-contrast:  ;
  --tw-backdrop-grayscale:  ;
  --tw-backdrop-hue-rotate:  ;
  --tw-backdrop-invert:  ;
  --tw-backdrop-opacity:  ;
  --tw-backdrop-saturate:  ;
  --tw-backdrop-sepia:  ;
}

.fixed{
  position: fixed;
}

.bottom-0{
  bottom: 0px;
}

.left-0{
  left: 0px;
}

.table{
  display: table;
}

.h-12{
  height: 7rem;
}

.w-1\/2{
  width: 50%;
}

.w-full{
  width: 100%;
}

.border-collapse{
  border-collapse: collapse;
}

.border-spacing-0{
  --tw-border-spacing-x: 0px;
  --tw-border-spacing-y: 0px;
  border-spacing: var(--tw-border-spacing-x) var(--tw-border-spacing-y);
}

.whitespace-nowrap{
  white-space: nowrap;
}
    
.border-b{
  border-bottom-width: 1px;
}

.border-b-2{
  border-bottom-width: 2px;
}

.border-r{
  border-right-width: 1px;
}

.border-main{
  border-color: #50c3a5;
}

.bg-main{
  background-color: #50c3a5;
}

.bg-slate-100{
  background-color: #f1f5f9;
}

.p-3{
  padding: 0.75rem;
}

.px-14{
  padding-left: 3.5rem;
  padding-right: 3.5rem;
}

.px-2{
  padding-left: 0.5rem;
  padding-right: 0.5rem;
}

.py-10{
  padding-top: 2.5rem;
  padding-bottom: 2.5rem;
}

.py-3{
  padding-top: 0.75rem;
  padding-bottom: 0.75rem;
}

.py-4{
  padding-top: 1rem;
  padding-bottom: 1rem;
}

.py-6{
  padding-top: 1.5rem;
  padding-bottom: 1.5rem;
}

.pb-3{
  padding-bottom: 0.75rem;
}

.pl-2{
  padding-left: 0.5rem;
}

.pl-3{
  padding-left: 0.75rem;
}

.pl-4{
  padding-left: 1rem;
}

.pr-3{
  padding-right: 0.75rem;
}

.pr-4{
  padding-right: 1rem;
}

.text-center{
  text-align: center;
}

.text-right{
  text-align: right;
}

.align-top{
  vertical-align: top;
}

.text-sm{
  font-size: 0.875rem;
  line-height: 1.25rem;
}

.text-xs{
  font-size: 0.75rem;
  line-height: 1rem;
}

.font-bold{
  font-weight: 700;
}

.italic{
  font-style: italic;
}

.text-main{
  color: #50c3a5;
}

.text-neutral-600{
  color: #525252;
}

.text-neutral-700{
  color: #404040;
}

.text-slate-300{
  color: #cbd5e1;
}

.text-slate-400{
  color: #94a3b8;
}

.text-white{
  color: black;
}

@page {
  margin: 0;
}

@media print {
  body {
    -webkit-print-color-adjust: exact;
  }
}

</style>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div class="py-4">
                                <div class="px-14 py-6">
                                    <table class="w-full border-collapse border-spacing-0">
                                        <tbody>
                                            <tr>
                                                <td class="w-full align-top">
                                                    <div>
                                                        <img src="<?php echo URL; ?>img/logo.jpg" alt="logo"
                                                        height="100"
                                                            class="h-12" />
                                                    </div>
                                                </td>

                                                <td class="align-top">
                                                    <div class="text-sm">
                                                        <table class="border-collapse border-spacing-0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="border-r pr-4">
                                                                        <div>
                                                                            <p
                                                                                class="whitespace-nowrap text-slate-400 text-right">
                                                                                Date</p>
                                                                            <p
                                                                                class="whitespace-nowrap font-bold text-main text-right">
                                                                                <?php echo $invoice['date'] ?></p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="pl-4">
                                                                        <div>
                                                                            <p
                                                                                class="whitespace-nowrap text-slate-400 text-right">
                                                                                Invoice #</p>
                                                                            <p
                                                                                class="whitespace-nowrap font-bold text-main text-right">
                                                                                <?php echo $invoice['idInvoice'] ?></p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="bg-slate-100 px-14 py-6 text-sm">
                                    <table class="w-full border-collapse border-spacing-0">
                                        <tbody>
                                            <tr>
                                                <td class="w-1/2 align-top">
                                                    <div class="text-sm text-neutral-600">
                                                        <p class="font-bold">Invoice Management</p>
                                                        <p>Nit: 12345678-9</p>
                                                        <p>Email: invoice@company.com</p>
                                                        <p>Phone: 3692581422</p>
                                                        <p>Address: Calle 6 # 7-9 Ed.Alto</p>
                                                    </div>
                                                </td>
                                                <td class="w-1/2 align-top text-right">
                                                    <div class="text-sm text-neutral-600">
                                                        <p class="font-bold">Customer</p>
                                                        <p>Full Name: <?php echo $invoice['name'] ?></p>
                                                        <p>Document: <?php echo $invoice['document'] ?></p>
                                                        <p>Email: <?php echo $invoice['email'] ?></p>
                                                        <p>Phone: <?php echo $invoice['phone'] ?></p>
                                                        <p>Address: <?php echo $invoice['Address'] ?></p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="px-14 py-10 text-sm text-neutral-700">
                                    <table class="w-full border-collapse border-spacing-0">
                                        <thead>
                                            <tr>
                                                <td class="border-b-2 border-main pb-3 pl-3 font-bold text-main">#</td>
                                                <td class="border-b-2 border-main pb-3 pl-2 font-bold text-main">Code</td>
                                                <td class="border-b-2 border-main pb-3 pl-2 font-bold text-main">Sku</td>
                                                <td
                                                    class="border-b-2 border-main pb-3 pl-2 font-bold text-main">
                                                    Price</td>
                                                <td
                                                    class="border-b-2 border-main pb-3 pl-2 font-bold text-main">
                                                    Qty.</td>
                                                <td
                                                    class="border-b-2 border-main pb-3 pl-2 pr-3 text-right font-bold text-main">
                                                    Subtotal</td>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $netTotal=0;
                                                foreach($invoice['items']as $index=>$item):
                                                    $price = $invoice['items'][$index]['value'];
                                                    $quantity = $invoice['items'][$index]['quantity'];
                                                    
                                                    $subtotal = $price * $quantity;
                                                    $netTotal += $subtotal;
                                                    $tax = $netTotal*0.19;
                                                    $Total = $netTotal + $tax;
                                                    
                                                    $priceFormat = "$ ".number_format($price, 2, ",", "."). " COP";
                                                    $subtotalFormat = "$ ".number_format($subtotal, 2, ",", "."). " COP";

                                            ?>
                                                <tr>
                                                <td class="border-b py-3 pl-3"><?php echo $index+1; ?></td>
                                                <td class="border-b py-3 pl-2"><?php echo $invoice['items'][$index]['code'] ?></td>
                                                <td class="border-b py-3 pl-2"><?php echo $invoice['items'][$index]['sku'] ?></td>
                                                <td class="border-b py-3 pl-2"><?php echo $priceFormat ?></td>
                                                <td class="border-b py-3 pl-2"><?php echo $quantity ?></td>
                                                <td class="border-b py-3 pl-2 pr-3 text-right"><?php echo $subtotalFormat ?></td>
                                            </tr>
                                            <?php endforeach;
                                                $netTotalFormat = "$ ".number_format($netTotal, 2, ",", "."). " COP";
                                                $taxFormat = "$ ".number_format($tax, 2, ",", "."). " COP";
                                                $totalFormat = "$ ".number_format($Total, 2, ",", "."). " COP";
                                            ?>
                                            <tr>
                                                <td colspan="7">
                                                    <table class="w-full border-collapse border-spacing-0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="w-full"></td>
                                                                <td>
                                                                    <table
                                                                        class="w-full border-collapse border-spacing-0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="border-b p-3">
                                                                                    <div
                                                                                        class="whitespace-nowrap text-slate-400">
                                                                                        Net total:</div>
                                                                                </td>
                                                                                <td class="border-b p-3 text-right">
                                                                                    <div
                                                                                        class="whitespace-nowrap font-bold text-main">
                                                                                        <?php echo $netTotalFormat ?></div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="p-3">
                                                                                    <div
                                                                                        class="whitespace-nowrap text-slate-400">
                                                                                        Taxes:
                                                                                <td class="p-3 text-right">
                                                                                    <div
                                                                                        class="whitespace-nowrap font-bold text-main">
                                                                                        <?php echo $taxFormat ?></div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="bg-main p-3">
                                                                                    <div
                                                                                        class="whitespace-nowrap font-bold text-white">
                                                                                        Total:</div>
                                                                                </td>
                                                                                <td class="bg-main p-3 text-right">
                                                                                    <div
                                                                                        class="whitespace-nowrap font-bold text-white">
                                                                                        <?php echo $totalFormat ?></div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="px-14 text-sm text-neutral-700">
                                    <p class="text-main font-bold">PAYMENT DETAILS</p>
                                    <p>Banks of Banks</p>
                                    <p>Bank/Sort Code: 1234567</p>
                                    <p>Account Number: 123456678</p>
                                    <p>Payment Reference: COL-00335</p>
                                </div>

                                <div class="px-14 py-10 text-sm text-neutral-700">
                                    <p class="text-main font-bold">Notes</p>
                                    <p class="italic"><?php echo $invoice['remark'] ?></p>
                                    </dvi>

                                    <footer
                                        class="fixed bottom-0 left-0 bg-slate-100 w-full text-neutral-600 text-center text-xs py-3">
                                        Invoice MAnagement
                                        <span class="text-slate-300 px-2">|</span>
                                        invoice@company.com
                                        <span class="text-slate-300 px-2">|</span>
                                        +57 369 258 14 22
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>