@if (Auth::guest())
@else
    <text
       id="text4807"
       y="209.37502"
       x="212.98865"
       style="font-style:normal;font-variant:normal;font-weight:500;font-stretch:normal;font-size:214.45788574px;line-height:125%;font-family:chunky;-inkscape-font-specification:'chunky, Medium';text-align:start;letter-spacing:0px;word-spacing:0px;writing-mode:lr-tb;text-anchor:start;fill:#0055d4;fill-opacity:1;stroke:none;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
       xml:space="preserve"><tspan
         y="209.37502"
         x="212.98865"
         id="tspan4809">Hallo {{ Auth::user()->name }}!</tspan></text>
@endif
