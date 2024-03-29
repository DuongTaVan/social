<!DOCTYPE html><html><head><meta charset="utf-8"><title>API Documentation</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"><style>@import url('https://fonts.googleapis.com/css?family=Roboto:400,700|Inconsolata|Raleway:200');.hljs-comment,.hljs-title{color:#8e908c}.hljs-variable,.hljs-attribute,.hljs-tag,.hljs-regexp,.ruby .hljs-constant,.xml .hljs-tag .hljs-title,.xml .hljs-pi,.xml .hljs-doctype,.html .hljs-doctype,.css .hljs-id,.css .hljs-class,.css .hljs-pseudo{color:#c82829}.hljs-number,.hljs-preprocessor,.hljs-pragma,.hljs-built_in,.hljs-literal,.hljs-params,.hljs-constant{color:#f5871f}.ruby .hljs-class .hljs-title,.css .hljs-rules .hljs-attribute{color:#eab700}.hljs-string,.hljs-value,.hljs-inheritance,.hljs-header,.ruby .hljs-symbol,.xml .hljs-cdata{color:#718c00}.css .hljs-hexcolor{color:#3e999f}.hljs-function,.python .hljs-decorator,.python .hljs-title,.ruby .hljs-function .hljs-title,.ruby .hljs-title .hljs-keyword,.perl .hljs-sub,.javascript .hljs-title,.coffeescript .hljs-title{color:#4271ae}.hljs-keyword,.javascript .hljs-function{color:#8959a8}.hljs{display:block;background:white;color:#4d4d4c;padding:.5em}.coffeescript .javascript,.javascript .xml,.tex .hljs-formula,.xml .javascript,.xml .vbscript,.xml .css,.xml .hljs-cdata{opacity:.5}.right .hljs-comment{color:#969896}.right .css .hljs-class,.right .css .hljs-id,.right .css .hljs-pseudo,.right .hljs-attribute,.right .hljs-regexp,.right .hljs-tag,.right .hljs-variable,.right .html .hljs-doctype,.right .ruby .hljs-constant,.right .xml .hljs-doctype,.right .xml .hljs-pi,.right .xml .hljs-tag .hljs-title{color:#c66}.right .hljs-built_in,.right .hljs-constant,.right .hljs-literal,.right .hljs-number,.right .hljs-params,.right .hljs-pragma,.right .hljs-preprocessor{color:#de935f}.right .css .hljs-rule .hljs-attribute,.right .ruby .hljs-class .hljs-title{color:#f0c674}.right .hljs-header,.right .hljs-inheritance,.right .hljs-name,.right .hljs-string,.right .hljs-value,.right .ruby .hljs-symbol,.right .xml .hljs-cdata{color:#b5bd68}.right .css .hljs-hexcolor,.right .hljs-title{color:#8abeb7}.right .coffeescript .hljs-title,.right .hljs-function,.right .javascript .hljs-title,.right .perl .hljs-sub,.right .python .hljs-decorator,.right .python .hljs-title,.right .ruby .hljs-function .hljs-title,.right .ruby .hljs-title .hljs-keyword{color:#81a2be}.right .hljs-keyword,.right .javascript .hljs-function{color:#b294bb}.right .hljs{display:block;overflow-x:auto;background:#1d1f21;color:#c5c8c6;padding:.5em;-webkit-text-size-adjust:none}.right .coffeescript .javascript,.right .javascript .xml,.right .tex .hljs-formula,.right .xml .css,.right .xml .hljs-cdata,.right .xml .javascript,.right .xml .vbscript{opacity:.5}.hljs-comment,.hljs-quote{color:#9e8f9e}.hljs-attribute,.hljs-link,.hljs-name,.hljs-regexp,.hljs-selector-class,.hljs-selector-id,.hljs-tag,.hljs-template-variable,.hljs-variable{color:#ca402b}.hljs-built_in,.hljs-literal,.hljs-meta,.hljs-number,.hljs-params,.hljs-type{color:#a65926}.hljs-bullet,.hljs-string,.hljs-symbol{color:#918b3b}.hljs-section,.hljs-title{color:#516aec}.hljs-keyword,.hljs-selector-tag{color:#7b59c0}.hljs{display:block;overflow-x:auto;background:#1b181b;color:#ab9bab;padding:.5em}.hljs-emphasis{font-style:italic}.hljs-strong{font-weight:700}.right .hljs-comment,.right .hljs-quote{color:#776977}.right .hljs-attribute,.right .hljs-link,.right .hljs-name,.right .hljs-regexp,.right .hljs-selector-class,.right .hljs-selector-id,.right .hljs-tag,.right .hljs-template-variable,.right .hljs-variable{color:#ca402b}.right .hljs-built_in,.right .hljs-literal,.right .hljs-meta,.right .hljs-number,.right .hljs-params,.right .hljs-type{color:#a65926}.right .hljs-bullet,.right .hljs-string,.right .hljs-symbol{color:#918b3b}.right .hljs-section,.right .hljs-title{color:#516aec}.right .hljs-keyword,.right .hljs-selector-tag{color:#7b59c0}.right .hljs{display:block;overflow-x:auto;background:#f7f3f7;color:#695d69;padding:.5em}.right .hljs-emphasis{font-style:italic}.right .hljs-strong{font-weight:700}body{color:#c8c8c8;background:#272b30;font:400 14px / 1.42 'Roboto',Helvetica,sans-serif}header{border-bottom:1px solid #373d44;margin-bottom:12px}h1,h2,h3,h4,h5{color:#c8c8c8;margin:12px 0}h1 .permalink,h2 .permalink,h3 .permalink,h4 .permalink,h5 .permalink{margin-left:0;opacity:0;transition:opacity .25s ease}h1:hover .permalink,h2:hover .permalink,h3:hover .permalink,h4:hover .permalink,h5:hover .permalink{opacity:1}.triple h1 .permalink,.triple h2 .permalink,.triple h3 .permalink,.triple h4 .permalink,.triple h5 .permalink{opacity:.15}.triple h1:hover .permalink,.triple h2:hover .permalink,.triple h3:hover .permalink,.triple h4:hover .permalink,.triple h5:hover .permalink{opacity:.15}h1{font:200 36px 'Raleway',Helvetica,sans-serif;font-size:36px}h2{font:200 36px 'Raleway',Helvetica,sans-serif;font-size:30px}h3{font-size:100%;text-transform:uppercase}h5{font-size:100%;font-weight:normal}p{margin:0 0 10px}p.choices{line-height:1.6}a{color:white;text-decoration:none}li p{margin:0}hr.split{border:0;height:1px;width:100%;padding-left:6px;margin:12px auto;background-image:linear-gradient(to right, rgba(200,200,200,0) 20%, rgba(200,200,200,0.2) 51.4%, rgba(39,43,48,0.2) 51.4%, rgba(39,43,48,0) 80%)}dl dt{float:left;width:130px;clear:left;text-align:right;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-weight:700}dl dd{margin-left:150px}blockquote{color:rgba(200,200,200,0.5);font-size:15.5px;padding:10px 20px;margin:12px 0;border-left:5px solid #2b3237}blockquote p:last-child{margin-bottom:0}pre{background-color:#202529;padding:12px;border:1px solid #424c54;border-radius:6px;overflow:auto}pre code{color:#c8c8c8;background-color:transparent;padding:0;border:none}code{color:#ddd;background-color:#373b40;font:'Inconsolata',monospace;padding:1px 4px;border:1px solid #424c54;border-radius:3px}ul,ol{padding-left:2em}table{border-collapse:collapse;border-spacing:0;margin-bottom:12px}table tr:nth-child(2n){background-color:#22262a}table th,table td{padding:6px 12px;border:1px solid #101214}.text-muted{opacity:.5}.note,.warning{padding:.3em 1em;margin:1em 0;border-radius:2px;font-size:90%}.note h1,.warning h1,.note h2,.warning h2,.note h3,.warning h3,.note h4,.warning h4,.note h5,.warning h5,.note h6,.warning h6{font-family:200 36px 'Raleway',Helvetica,sans-serif;font-size:135%;font-weight:500}.note p,.warning p{margin:.5em 0}.note{color:#c8c8c8;background-color:#2b373e;border-left:4px solid #5bc0de}.note h1,.note h2,.note h3,.note h4,.note h5,.note h6{color:#5bc0de}.warning{color:#c8c8c8;background-color:#352b30;border-left:4px solid #e9322d}.warning h1,.warning h2,.warning h3,.warning h4,.warning h5,.warning h6{color:#e9322d}header{margin-top:24px}nav{position:fixed;top:24px;bottom:0;overflow-y:auto}nav .resource-group{padding:0}nav .resource-group .heading{position:relative}nav .resource-group .heading .chevron{position:absolute;top:12px;right:12px;opacity:.5}nav .resource-group .heading a{display:block;color:#c8c8c8;opacity:.7;border-left:2px solid transparent;margin:0}nav .resource-group .heading a:hover{text-decoration:none;background-color:bad-color;border-left:2px solid #c8c8c8}nav ul{list-style-type:none;padding-left:0}nav ul a{display:block;font-size:13px;color:rgba(200,200,200,0.7);padding:8px 12px;border-top:1px solid #202020;border-left:2px solid transparent;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}nav ul a:hover{text-decoration:none;background-color:bad-color;border-left:2px solid #c8c8c8}nav ul>li{margin:0}nav ul>li:first-child{margin-top:-12px}nav ul>li:last-child{margin-bottom:-12px}nav ul ul a{padding-left:24px}nav ul ul li{margin:0}nav ul ul li:first-child{margin-top:0}nav ul ul li:last-child{margin-bottom:0}nav>div>div>ul>li:first-child>a{border-top:none}.preload *{transition:none !important}.pull-left{float:left}.pull-right{float:right}.badge{display:inline-block;float:right;min-width:10px;min-height:14px;padding:3px 7px;font-size:12px;color:#fff;background-color:#373d44;border-radius:10px;margin:-2px 0}.badge.get{color:white;background-color:#5bc0de}.badge.head{color:white;background-color:#5bc0de}.badge.options{color:white;background-color:#5bc0de}.badge.put{color:white;background-color:#f89406}.badge.patch{color:white;background-color:#f89406}.badge.post{color:white;background-color:#62c462}.badge.delete{color:white;background-color:#ee5f5b}.collapse-button{float:right}.collapse-button .close{display:none;color:white;cursor:pointer}.collapse-button .open{color:white;cursor:pointer}.collapse-button.show .close{display:inline}.collapse-button.show .open{display:none}.collapse-content{max-height:0;overflow:hidden;transition:max-height .3s ease-in-out}nav{width:220px}.container{max-width:940px;margin-left:auto;margin-right:auto}.container .row .content{margin-left:244px;width:696px}.container .row:after{content:'';display:block;clear:both}.container-fluid nav{width:22%}.container-fluid .row .content{margin-left:24%}.container-fluid.triple nav{width:16.5%;padding-right:1px}.container-fluid.triple .row .content{position:relative;margin-left:16.5%;padding-left:24px}.middle:before,.middle:after{content:'';display:table}.middle:after{clear:both}.middle{box-sizing:border-box;width:51.5%;padding-right:12px}.right{box-sizing:border-box;float:right;width:48.5%;padding-left:12px}.right a{color:#666}.right h1,.right h2,.right h3,.right h4,.right h5,.right p,.right div{color:#272b30}.right pre{background-color:#f7f6f5;border:1px solid #f7f6f5}.right pre code{color:#333}.right .description{margin-top:12px}.triple .resource-heading{font-size:125%}.definition{margin-top:12px;margin-bottom:12px}.definition .method{font-weight:bold}.definition .method.get{color:#2e98b8}.definition .method.head{color:#2e98b8}.definition .method.options{color:#2e98b8}.definition .method.post{color:#2eb82e}.definition .method.put{color:#b87f2e}.definition .method.patch{color:#b87f2e}.definition .method.delete{color:#b8322e}.definition .uri{word-break:break-all;word-wrap:break-word}.definition .hostname{opacity:.5}.example-names{background-color:#eee;padding:12px;border-radius:6px}.example-names .tab-button{cursor:pointer;color:#c8c8c8;border:1px solid #ddd;padding:6px;margin-left:12px}.example-names .tab-button.active{background-color:#d5d5d5}.right .example-names{background-color:#adaaa6}.right .example-names .tab-button{color:#272b30;border:1px solid #d8d4cf;border-radius:6px}.right .example-names .tab-button.active{background-color:#95918b}#nav-background{position:fixed;left:0;top:0;bottom:0;width:16.5%;padding-right:14.4px;background-color:#272b30;border-right:1px solid #272b30;z-index:-1}#right-panel-background{position:absolute;right:-12px;top:-12px;bottom:-12px;width:48.6%;background-color:#d8d4cf;z-index:-1}@media (max-width:1200px){nav{width:198px}.container{max-width:840px}.container .row .content{margin-left:224px;width:606px}}@media (max-width:992px){nav{width:169.4px}.container{max-width:720px}.container .row .content{margin-left:194px;width:526px}}@media (max-width:768px){nav{display:none}.container{width:95%;max-width:none}.container .row .content,.container-fluid .row .content,.container-fluid.triple .row .content{margin-left:auto;margin-right:auto;width:95%}#nav-background{display:none}#right-panel-background{width:48.6%}}.back-to-top{position:fixed;z-index:1;bottom:0;right:24px;padding:4px 8px;color:rgba(200,200,200,0.5);background-color:#373d44;text-decoration:none !important;border-top:1px solid #202020;border-left:1px solid #202020;border-right:1px solid #202020;border-top-left-radius:3px;border-top-right-radius:3px}.resource-group{padding:12px;margin-bottom:12px;background-color:#272b30;border:1px solid #202020;border-radius:6px}.resource-group h2.group-heading,.resource-group .heading a{padding:12px;margin:-12px -12px 12px -12px;background-color:#373d44;border-bottom:1px solid #202020;border-top-left-radius:6px;border-top-right-radius:6px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden}.triple .content .resource-group{padding:0;border:none}.triple .content .resource-group h2.group-heading,.triple .content .resource-group .heading a{margin:0 0 12px 0;border:1px solid #202020}nav .resource-group .heading a{padding:12px;margin-bottom:0}nav .resource-group .collapse-content{padding:0}.action{margin-bottom:12px;padding:12px 12px 0 12px;overflow:hidden;border:1px solid transparent;border-radius:6px}.action h4.action-heading{padding:6px 12px;margin:-12px -12px 12px -12px;border-bottom:1px solid transparent;border-top-left-radius:6px;border-top-right-radius:6px;overflow:hidden}.action h4.action-heading .name{float:right;font-weight:normal;padding:6px 0}.action h4.action-heading .method{padding:6px 12px;margin-right:12px;border-radius:3px;display:inline-block}.action h4.action-heading .method.get{color:#fff;background-color:#2390b0}.action h4.action-heading .method.head{color:#fff;background-color:#2390b0}.action h4.action-heading .method.options{color:#fff;background-color:#2390b0}.action h4.action-heading .method.put{color:#fff;background-color:#945904}.action h4.action-heading .method.patch{color:#fff;background-color:#945904}.action h4.action-heading .method.post{color:#fff;background-color:#348c34}.action h4.action-heading .method.delete{color:#fff;background-color:#ce1a15}.action h4.action-heading code{color:black;background-color:rgba(255,255,255,0.7);border-color:transparent;font-weight:normal;word-break:break-all;display:inline-block;margin-top:2px}.action dl.inner{padding-bottom:2px}.action .title{border-bottom:1px solid #272b30;margin:0 -12px -1px -12px;padding:12px}.action.get{border-color:#202020}.action.get h4.action-heading{color:#2390b0;background:#5bc0de;border-bottom-color:#202020}.action.head{border-color:#202020}.action.head h4.action-heading{color:#2390b0;background:#5bc0de;border-bottom-color:#202020}.action.options{border-color:#202020}.action.options h4.action-heading{color:#2390b0;background:#5bc0de;border-bottom-color:#202020}.action.post{border-color:#202020}.action.post h4.action-heading{color:#348c34;background:#62c462;border-bottom-color:#202020}.action.put{border-color:#202020}.action.put h4.action-heading{color:#945904;background:#f89406;border-bottom-color:#202020}.action.patch{border-color:#202020}.action.patch h4.action-heading{color:#945904;background:#f89406;border-bottom-color:#202020}.action.delete{border-color:#202020}.action.delete h4.action-heading{color:#ce1a15;background:#ee5f5b;border-bottom-color:#202020}</style></head><body class="preload"><a href="#top" class="text-muted back-to-top"><i class="fa fa-toggle-up"></i>&nbsp;Back to top</a><div class="container"><div class="row"><nav><div class="resource-group"><div class="heading"><div class="chevron"><i class="open fa fa-angle-down"></i></div><a href="#authenticate-social">Authenticate SOCIAL</a></div><div class="collapse-content"><ul><li><a href="#authenticate-social-register-post"><span class="badge post"><i class="fa fa-plus"></i></span>Register</a></li><li><a href="#authenticate-social-login-post"><span class="badge post"><i class="fa fa-plus"></i></span>Login</a></li><li><a href="#authenticate-social-refresh-post"><span class="badge post"><i class="fa fa-plus"></i></span>refresh</a></li><li><a href="#authenticate-social-login-get"><span class="badge get"><i class="fa fa-arrow-down"></i></span>user-profile</a></li><li><a href="#authenticate-social-logout-post"><span class="badge post"><i class="fa fa-plus"></i></span>logout</a></li><li><a href="#authenticate-social-reset-password-post"><span class="badge post"><i class="fa fa-plus"></i></span>Reset password</a></li><li><a href="#authenticate-social-change-password-post"><span class="badge post"><i class="fa fa-plus"></i></span>Change password</a></li><li><a href="#authenticate-social-check-token-reset-password-at-get"><span class="badge get"><i class="fa fa-arrow-down"></i></span>Check token reset password at</a></li></ul></div></div></nav><div class="content"><header><h1 id="top">API Documentation</h1></header><section id="authenticate-social" class="resource-group"><h2 class="group-heading">Authenticate SOCIAL <a href="#authenticate-social" class="permalink">&para;</a></h2><div id="authenticate-social-register" class="resource"><h3 class="resource-heading">Register <a href="#authenticate-social-register" class="permalink">&nbsp;&para;</a></h3><div id="authenticate-social-register-post" class="action post"><h4 class="action-heading"><div class="name">Register</div><a href="#authenticate-social-register-post" class="method post">POST</a><code class="uri">/auth/api/register</code></h4><h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/auth/api/register</span></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[
    {
    "<span class="hljs-attribute">message</span>": <span class="hljs-value"><span class="hljs-string">"user successfully registered"</span></span>,
    "<span class="hljs-attribute">users</span>": <span class="hljs-value">[
        {
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"John Doe"</span></span>,
        "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"john@gmail.com"</span></span>,
        "<span class="hljs-attribute">phone</span>": <span class="hljs-value"><span class="hljs-number">0939748336</span></span>,
        "<span class="hljs-attribute">block</span>": <span class="hljs-value">['<span class="hljs-number">1</span>','<span class="hljs-number">2</span>']</span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2020-06-16T20:42:51.0000z"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2020-06-16T20:42:51.0000z"</span>
        </span>}
    ]
    </span>}
]</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="authenticate-social-login" class="resource"><h3 class="resource-heading">Login <a href="#authenticate-social-login" class="permalink">&nbsp;&para;</a></h3><div id="authenticate-social-login-post" class="action post"><h4 class="action-heading"><div class="name">Login</div><a href="#authenticate-social-login-post" class="method post">POST</a><code class="uri">/auth/api/login</code></h4><p>You need to enter your email and password</p>
<h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/auth/api/login</span></div><div class="title"><strong>Request&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
    "accecss_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYxODM4NTc3NywiZXhwIjoxNjE4Mzg5Mzc3LCJuYmYiOjE2MTgzODU3NzcsImp0aSI6InhWZWRob01RSWVxdUJ2NUwiLCJzdWIiOjU1LCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.W7P-dwrVey6dEwvVflBMmDyySUgCdPEt_kljSecaYmc",
    "user": [
        "name" =&gt; "john Doe"",
        "email" =&gt; "john@gmail.com",
        "phone" =&gt; "031355454232"
        "updated_at": "2020-06-16T20:42:51.0000z",
        "created_at": "2020-06-16T20:42:51.0000z"
        ]
}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>422</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
    "<span class="hljs-attribute">error</span>": <span class="hljs-value"><span class="hljs-string">"Unauthorized"</span></span>,
}</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="authenticate-social-refresh" class="resource"><h3 class="resource-heading">refresh <a href="#authenticate-social-refresh" class="permalink">&nbsp;&para;</a></h3><div id="authenticate-social-refresh-post" class="action post"><h4 class="action-heading"><div class="name">refresh</div><a href="#authenticate-social-refresh-post" class="method post">POST</a><code class="uri">/auth/api/refresh</code></h4><h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/auth/api/refresh</span></div><div class="title"><strong>Request&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">access_token</span>": <span class="hljs-value"><span class="hljs-string">"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9hdXRoXC9yZWZyZXNoIiwiaWF0IjoxNjE4Mzg2MjU1LCJleHAiOjE2MTgzODk4ODYsIm5iZiI6MTYxODM4NjI4NiwianRpIjoicDNQM2t1N3QweDQwMjNSeCIsInN1YiI6NTUsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.1s-7ZoqP2Kvwfp39DTVs2TmRPiHPYG4muWHVUBzcVIM"</span></span>,
  "<span class="hljs-attribute">token_type</span>": <span class="hljs-value"><span class="hljs-string">"bearer"</span></span>,
  "<span class="hljs-attribute">expires_in</span>": <span class="hljs-value"><span class="hljs-number">3600</span></span>,
  "<span class="hljs-attribute">user</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">55</span></span>,
    "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"duongtv"</span></span>,
    "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"duongtv2712@gmail.com"</span></span>,
    "<span class="hljs-attribute">phone</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
    "<span class="hljs-attribute">block</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
    "<span class="hljs-attribute">token_reset_password</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
    "<span class="hljs-attribute">token_reset_password_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
    "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2021-04-14T07:36:03.000000Z"</span></span>,
    "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2021-04-14T07:36:03.000000Z"</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="authenticate-social-login-1" class="resource"><h3 class="resource-heading">Login <a href="#authenticate-social-login-1" class="permalink">&nbsp;&para;</a></h3><div id="authenticate-social-login-get" class="action get"><h4 class="action-heading"><div class="name">user-profile</div><a href="#authenticate-social-login-get" class="method get">GET</a><code class="uri">/auth/api/user-profile</code></h4><h4>Example URI</h4><div class="definition"><span class="method get">GET</span>&nbsp;<span class="uri"><span class="hostname"></span>/auth/api/user-profile</span></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">55</span></span>,
  "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"duongtv"</span></span>,
  "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"duongtv2712@gmail.com"</span></span>,
  "<span class="hljs-attribute">phone</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
  "<span class="hljs-attribute">block</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
  "<span class="hljs-attribute">token_reset_password</span>": <span class="hljs-value"><span class="hljs-string">"8ujYLgOWg97Svws8khD8TyYUYZP3A9Ak3aVYHhWpfzq0qXJwmkO04TuZu38ZS5F1XWb1ECk27CN3JbRN"</span></span>,
  "<span class="hljs-attribute">token_reset_password_at</span>": <span class="hljs-value"><span class="hljs-string">"2021-04-14 15:08:07"</span></span>,
  "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2021-04-14T07:36:03.000000Z"</span></span>,
  "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2021-04-14T08:08:07.000000Z"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="authenticate-social-logout" class="resource"><h3 class="resource-heading">Logout <a href="#authenticate-social-logout" class="permalink">&nbsp;&para;</a></h3><div id="authenticate-social-logout-post" class="action post"><h4 class="action-heading"><div class="name">logout</div><a href="#authenticate-social-logout-post" class="method post">POST</a><code class="uri">/auth/api/logout</code></h4><h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/auth/api/logout</span></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code><span class="hljs-string">"User successfully signed out"</span></code></pre><div style="height: 1px;"></div></div></div></div></div><div id="authenticate-social-reset-password" class="resource"><h3 class="resource-heading">reset password <a href="#authenticate-social-reset-password" class="permalink">&nbsp;&para;</a></h3><div id="authenticate-social-reset-password-post" class="action post"><h4 class="action-heading"><div class="name">Reset password</div><a href="#authenticate-social-reset-password-post" class="method post">POST</a><code class="uri">/auth/api/reset-password-request</code></h4><h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/auth/api/reset-password-request</span></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code><span class="hljs-string">"Check your inbox, we have sent a link to reset email"</span></code></pre><div style="height: 1px;"></div></div></div></div></div><div id="authenticate-social-change-password" class="resource"><h3 class="resource-heading">Change password <a href="#authenticate-social-change-password" class="permalink">&nbsp;&para;</a></h3><div id="authenticate-social-change-password-post" class="action post"><h4 class="action-heading"><div class="name">Change password</div><a href="#authenticate-social-change-password-post" class="method post">POST</a><code class="uri">/auth/api/change-password</code></h4><h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/auth/api/change-password</span></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code><span class="hljs-string">"change password success !"</span></code></pre><div style="height: 1px;"></div></div></div></div></div><div id="authenticate-social-check-token-reset-password-at" class="resource"><h3 class="resource-heading">Check token reset password at <a href="#authenticate-social-check-token-reset-password-at" class="permalink">&nbsp;&para;</a></h3><div id="authenticate-social-check-token-reset-password-at-get" class="action get"><h4 class="action-heading"><div class="name">Check token reset password at</div><a href="#authenticate-social-check-token-reset-password-at-get" class="method get">GET</a><code class="uri">/check-token-reset-password-at/</code></h4><h4>Example URI</h4><div class="definition"><span class="method get">GET</span>&nbsp;<span class="uri"><span class="hostname"></span>/check-token-reset-password-at/</span></div><div class="title"><strong>Response&nbsp;&nbsp;<code>404</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">error</span>": <span class="hljs-value"><span class="hljs-string">"change password every 5 minutes"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>404</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
<span class="hljs-string">"password change over time"</span>
}

FORMAT: <span class="hljs-number">1</span>A</code></pre><div style="height: 1px;"></div></div></div></div></div></section><section id="user-social" class="resource-group"><h2 class="group-heading">User SOCIAL <a href="#user-social" class="permalink">&para;</a></h2><div id="user-social-list-user-block" class="resource"><h3 class="resource-heading">LIST USER BLOCK <a href="#user-social-list-user-block" class="permalink">&nbsp;&para;</a></h3><div id="user-social-list-user-block-get" class="action get"><h4 class="action-heading"><div class="name">List user block</div><a href="#user-social-list-user-block-get" class="method get">GET</a><code class="uri">/api/user/list-user-block</code></h4><h4>Example URI</h4><div class="definition"><span class="method get">GET</span>&nbsp;<span class="uri"><span class="hostname"></span>/api/user/list-user-block</span></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[
  {
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">5</span></span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"Nick Gutkowski"</span></span>,
        "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"von.greta@example.org"</span></span>,
        "<span class="hljs-attribute">phone</span>": <span class="hljs-value"><span class="hljs-string">"(272) 979-0956"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span>
      </span>},
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">6</span></span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"Jerome Lesch"</span></span>,
        "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"joannie.nitzsche@example.com"</span></span>,
        "<span class="hljs-attribute">phone</span>": <span class="hljs-value"><span class="hljs-string">"+1-678-265-5737"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span>
      </span>},
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"Meta Armstrong"</span></span>,
        "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"gkulas@example.com"</span></span>,
        "<span class="hljs-attribute">phone</span>": <span class="hljs-value"><span class="hljs-string">"+19306800711"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span>
      </span>},
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">2</span></span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"Christ Lueilwitz"</span></span>,
        "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"unique82@example.org"</span></span>,
        "<span class="hljs-attribute">phone</span>": <span class="hljs-value"><span class="hljs-string">"(585) 552-6264"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span>
      </span>}
    ]
  </span>}
]</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="user-social-add-user-block" class="resource"><h3 class="resource-heading">ADD USER BLOCK <a href="#user-social-add-user-block" class="permalink">&nbsp;&para;</a></h3><div id="user-social-add-user-block-post" class="action post"><h4 class="action-heading"><div class="name">Add user block</div><a href="#user-social-add-user-block-post" class="method post">POST</a><code class="uri">/api/user/add-user-block</code></h4><h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/api/user/add-user-block</span></div><div class="title"><strong>Request&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
    <span class="hljs-string">"add success"</span>
}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>404</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">error</span>": <span class="hljs-value"><span class="hljs-string">"user already exists"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="user-social-remove-user-block" class="resource"><h3 class="resource-heading">REMOVE USER BLOCK <a href="#user-social-remove-user-block" class="permalink">&nbsp;&para;</a></h3><div id="user-social-remove-user-block-post" class="action post"><h4 class="action-heading"><div class="name">Remove user block</div><a href="#user-social-remove-user-block-post" class="method post">POST</a><code class="uri">/api/user/remove-user-block</code></h4><h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/api/user/remove-user-block</span></div><div class="title"><strong>Request&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
    <span class="hljs-string">"remove success"</span>
}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>404</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">error</span>": <span class="hljs-value"><span class="hljs-string">"user not in the list"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="user-social-change-information" class="resource"><h3 class="resource-heading">CHANGE INFORMATION <a href="#user-social-change-information" class="permalink">&nbsp;&para;</a></h3><div id="user-social-change-information-post" class="action post"><h4 class="action-heading"><div class="name">change information</div><a href="#user-social-change-information-post" class="method post">POST</a><code class="uri">/api/user/change-information</code></h4><h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/api/user/change-information</span></div><div class="title"><strong>Request&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
    <span class="hljs-string">"Change information success"</span>
}</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="user-social-search-user" class="resource"><h3 class="resource-heading">SEARCH USER <a href="#user-social-search-user" class="permalink">&nbsp;&para;</a></h3><div id="user-social-search-user-get" class="action get"><h4 class="action-heading"><div class="name">change information</div><a href="#user-social-search-user-get" class="method get">GET</a><code class="uri">/api/user/search-user</code></h4><h4>Example URI</h4><div class="definition"><span class="method get">GET</span>&nbsp;<span class="uri"><span class="hostname"></span>/api/user/search-user</span></div><div class="title"><strong>Request&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
    <span class="hljs-string">"data"</span>: [
            {
                <span class="hljs-string">"id"</span>: <span class="hljs-number">3</span>,
                <span class="hljs-string">"name"</span>: <span class="hljs-string">"Harry Vandervort"</span>,
                <span class="hljs-string">"email"</span>: <span class="hljs-string">"ella91@example.net"</span>,
                <span class="hljs-string">"phone"</span>: <span class="hljs-string">"680.477.6740"</span>,
                <span class="hljs-string">"created_at"</span>: <span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span>,
                <span class="hljs-string">"updated_at"</span>: <span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span>
            },
            {
                <span class="hljs-string">"id"</span>: <span class="hljs-number">4</span>,
                <span class="hljs-string">"name"</span>: <span class="hljs-string">"Dr. Jeramy Hamill IV"</span>,
                <span class="hljs-string">"email"</span>: <span class="hljs-string">"dee51@example.org"</span>,
                <span class="hljs-string">"phone"</span>: <span class="hljs-string">"+1-305-624-2592"</span>,
                <span class="hljs-string">"created_at"</span>: <span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span>,
                <span class="hljs-string">"updated_at"</span>: <span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span>
            },
            {
                <span class="hljs-string">"id"</span>: <span class="hljs-number">10</span>,
                <span class="hljs-string">"name"</span>: <span class="hljs-string">"Geovany Hansen"</span>,
                <span class="hljs-string">"email"</span>: <span class="hljs-string">"monserrate18@example.net"</span>,
                <span class="hljs-string">"phone"</span>: <span class="hljs-string">"223-692-1434"</span>,
                <span class="hljs-string">"created_at"</span>: <span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span>,
                <span class="hljs-string">"updated_at"</span>: <span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span>
            },
            {
                <span class="hljs-string">"id"</span>: <span class="hljs-number">14</span>,
                <span class="hljs-string">"name"</span>: <span class="hljs-string">"Hal Fadel II"</span>,
                <span class="hljs-string">"email"</span>: <span class="hljs-string">"haag.logan@example.com"</span>,
                <span class="hljs-string">"phone"</span>: <span class="hljs-string">"734-689-9565"</span>,
                <span class="hljs-string">"created_at"</span>: <span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span>,
                <span class="hljs-string">"updated_at"</span>: <span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span>
            },
            {
                <span class="hljs-string">"id"</span>: <span class="hljs-number">32</span>,
                <span class="hljs-string">"name"</span>: <span class="hljs-string">"Mohamed Weimann"</span>,
                <span class="hljs-string">"email"</span>: <span class="hljs-string">"ottilie.cummerata@example.org"</span>,
                <span class="hljs-string">"phone"</span>: <span class="hljs-string">"(863) 533-6935"</span>,
                <span class="hljs-string">"created_at"</span>: <span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span>,
                <span class="hljs-string">"updated_at"</span>: <span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span>
            },
            {
                <span class="hljs-string">"id"</span>: <span class="hljs-number">41</span>,
                <span class="hljs-string">"name"</span>: <span class="hljs-string">"Mr. Giuseppe Harris III"</span>,
                <span class="hljs-string">"email"</span>: <span class="hljs-string">"mante.alexandro@example.org"</span>,
                <span class="hljs-string">"phone"</span>: <span class="hljs-string">"(341) 449-4142"</span>,
                <span class="hljs-string">"created_at"</span>: <span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span>,
                <span class="hljs-string">"updated_at"</span>: <span class="hljs-string">"2021-04-12T04:02:05.000000Z"</span>
            }
        ],
        <span class="hljs-string">"links"</span>: {
            <span class="hljs-string">"first"</span>: <span class="hljs-string">"http://127.0.0.1:8000/api/user/search-user?page=1"</span>,
            <span class="hljs-string">"last"</span>: <span class="hljs-string">"http://127.0.0.1:8000/api/user/search-user?page=1"</span>,
            <span class="hljs-string">"prev"</span>: <span class="hljs-literal">null</span>,
            <span class="hljs-string">"next"</span>: <span class="hljs-literal">null</span>
        },
        <span class="hljs-string">"meta"</span>: {
            <span class="hljs-string">"current_page"</span>: <span class="hljs-number">1</span>,
            <span class="hljs-string">"from"</span>: <span class="hljs-number">1</span>,
            <span class="hljs-string">"last_page"</span>: <span class="hljs-number">1</span>,
            <span class="hljs-string">"links"</span>: [
                {
                    <span class="hljs-string">"url"</span>: <span class="hljs-literal">null</span>,
                    <span class="hljs-string">"label"</span>: <span class="hljs-string">"&amp;laquo; Previous"</span>,
                    <span class="hljs-string">"active"</span>: <span class="hljs-literal">false</span>
                },
                {
                    <span class="hljs-string">"url"</span>: <span class="hljs-string">"http://127.0.0.1:8000/api/user/search-user?page=1"</span>,
                    <span class="hljs-string">"label"</span>: <span class="hljs-string">"1"</span>,
                    <span class="hljs-string">"active"</span>: <span class="hljs-literal">true</span>
                },
                {
                    <span class="hljs-string">"url"</span>: <span class="hljs-literal">null</span>,
                    <span class="hljs-string">"label"</span>: <span class="hljs-string">"Next &amp;raquo;"</span>,
                    <span class="hljs-string">"active"</span>: <span class="hljs-literal">false</span>
                }
            ],
            <span class="hljs-string">"path"</span>: <span class="hljs-string">"http://127.0.0.1:8000/api/user/search-user"</span>,
            <span class="hljs-string">"per_page"</span>: <span class="hljs-number">8</span>,
            <span class="hljs-string">"to"</span>: <span class="hljs-number">6</span>,
            <span class="hljs-string">"total"</span>: <span class="hljs-number">6</span>
        }
}


FORMAT: <span class="hljs-number">1</span>A</code></pre><div style="height: 1px;"></div></div></div></div></div></section><section id="comment-social" class="resource-group"><h2 class="group-heading">COMMENT SOCIAL <a href="#comment-social" class="permalink">&para;</a></h2><div id="comment-social-list-comment" class="resource"><h3 class="resource-heading">LIST COMMENT <a href="#comment-social-list-comment" class="permalink">&nbsp;&para;</a></h3><div id="comment-social-list-comment-get" class="action get"><h4 class="action-heading"><div class="name">List comment</div><a href="#comment-social-list-comment-get" class="method get">GET</a><code class="uri">/api/comment/list-comment/1</code></h4><h4>Example URI</h4><div class="definition"><span class="method get">GET</span>&nbsp;<span class="uri"><span class="hostname"></span>/api/comment/list-comment/1</span></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[
  {
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">6</span></span>,
        "<span class="hljs-attribute">content</span>": <span class="hljs-value"><span class="hljs-string">"fafafa"</span></span>,
        "<span class="hljs-attribute">comment_id</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">post_id</span>": <span class="hljs-value"><span class="hljs-number">117</span></span>,
        "<span class="hljs-attribute">user_id</span>": <span class="hljs-value"><span class="hljs-number">37</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">rep_comment</span>": <span class="hljs-value">[]
      </span>}
    ]
  </span>}
]</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="comment-social-add-comment" class="resource"><h3 class="resource-heading">ADD COMMENT <a href="#comment-social-add-comment" class="permalink">&nbsp;&para;</a></h3><div id="comment-social-add-comment-post" class="action post"><h4 class="action-heading"><div class="name">Add comment</div><a href="#comment-social-add-comment-post" class="method post">POST</a><code class="uri">/api/comment/add-comment/1</code></h4><h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/api/comment/add-comment/1</span></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[
    {

   <span class="hljs-string">"add comment success"</span>
    }

]</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="comment-social-detail-comment" class="resource"><h3 class="resource-heading">DETAIL COMMENT <a href="#comment-social-detail-comment" class="permalink">&nbsp;&para;</a></h3><div id="comment-social-detail-comment-get" class="action get"><h4 class="action-heading"><div class="name">detail comment</div><a href="#comment-social-detail-comment-get" class="method get">GET</a><code class="uri">/api/comment/detail-comment/1</code></h4><h4>Example URI</h4><div class="definition"><span class="method get">GET</span>&nbsp;<span class="uri"><span class="hostname"></span>/api/comment/detail-comment/1</span></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[
  {
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">6</span></span>,
      "<span class="hljs-attribute">content</span>": <span class="hljs-value"><span class="hljs-string">"fafafa"</span></span>,
      "<span class="hljs-attribute">comment_id</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
      "<span class="hljs-attribute">post_id</span>": <span class="hljs-value"><span class="hljs-number">117</span></span>,
      "<span class="hljs-attribute">user_id</span>": <span class="hljs-value"><span class="hljs-number">37</span></span>,
      "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
      "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span>
    </span>}
  </span>}
]</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="comment-social-update-comment" class="resource"><h3 class="resource-heading">UPDATE COMMENT <a href="#comment-social-update-comment" class="permalink">&nbsp;&para;</a></h3><div id="comment-social-update-comment-post" class="action post"><h4 class="action-heading"><div class="name">update comment</div><a href="#comment-social-update-comment-post" class="method post">POST</a><code class="uri">/api/comment/update-comment/1</code></h4><h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/api/comment/update-comment/1</span></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[
    {
        <span class="hljs-string">"update comment  success"</span>
    }
]</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="comment-social-remove-comment" class="resource"><h3 class="resource-heading">REMOVE COMMENT <a href="#comment-social-remove-comment" class="permalink">&nbsp;&para;</a></h3><div id="comment-social-remove-comment-post" class="action post"><h4 class="action-heading"><div class="name">remove comment</div><a href="#comment-social-remove-comment-post" class="method post">POST</a><code class="uri">/api/comment/remove-comment/1</code></h4><h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/api/comment/remove-comment/1</span></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[
    {
        <span class="hljs-string">"remove comment  success"</span>
    }
]



FORMAT: <span class="hljs-number">1</span>A</code></pre><div style="height: 1px;"></div></div></div></div></div></section><section id="like-post-&amp;-comment" class="resource-group"><h2 class="group-heading">LIKE POST & COMMENT <a href="#like-post-&amp;-comment" class="permalink">&para;</a></h2><div id="like-post-&amp;-comment-add-like-post" class="resource"><h3 class="resource-heading">ADD LIKE POST <a href="#like-post-&amp;-comment-add-like-post" class="permalink">&nbsp;&para;</a></h3><div id="like-post-&amp;-comment-add-like-post-post" class="action post"><h4 class="action-heading"><div class="name">add like post</div><a href="#like-post-&amp;-comment-add-like-post-post" class="method post">POST</a><code class="uri">/api/like/add-like/1</code></h4><h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/api/like/add-like/1</span></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[
    {

   <span class="hljs-string">"add like success"</span>
}

]</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="like-post-&amp;-comment-remove-like" class="resource"><h3 class="resource-heading">REMOVE LIKE <a href="#like-post-&amp;-comment-remove-like" class="permalink">&nbsp;&para;</a></h3><div id="like-post-&amp;-comment-remove-like-post" class="action post"><h4 class="action-heading"><div class="name">remove like post</div><a href="#like-post-&amp;-comment-remove-like-post" class="method post">POST</a><code class="uri">/api/like/remove-like/1</code></h4><h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/api/like/remove-like/1</span></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[
    {

   <span class="hljs-string">"remove like success"</span>
}

]</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="like-post-&amp;-comment-add-like-comment" class="resource"><h3 class="resource-heading">ADD LIKE COMMENT <a href="#like-post-&amp;-comment-add-like-comment" class="permalink">&nbsp;&para;</a></h3><div id="like-post-&amp;-comment-add-like-comment-post" class="action post"><h4 class="action-heading"><div class="name">add like comment</div><a href="#like-post-&amp;-comment-add-like-comment-post" class="method post">POST</a><code class="uri">/api/like/add-like-comment/1</code></h4><h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/api/like/add-like-comment/1</span></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[
    {

   <span class="hljs-string">"add like comment success"</span>
}

]</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="like-post-&amp;-comment-remove-like-comment" class="resource"><h3 class="resource-heading">REMOVE LIKE COMMENT <a href="#like-post-&amp;-comment-remove-like-comment" class="permalink">&nbsp;&para;</a></h3><div id="like-post-&amp;-comment-remove-like-comment-post" class="action post"><h4 class="action-heading"><div class="name">remove like comment</div><a href="#like-post-&amp;-comment-remove-like-comment-post" class="method post">POST</a><code class="uri">/api/like/remove-like-comment/1</code></h4><h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/api/like/remove-like-comment/1</span></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[
    {

   <span class="hljs-string">"remove like comment success"</span>
}

]</code></pre><div style="height: 1px;"></div></div></div></div></div></section></div></div></div><p style="text-align: center;" class="text-muted">Generated by&nbsp;<a href="https://github.com/danielgtaylor/aglio" class="aglio">aglio</a>&nbsp;on 21 Apr 2021</p><script>/* eslint-env browser */
/* eslint quotes: [2, "single"] */
'use strict';

/*
  Determine if a string ends with another string.
*/
function endsWith(str, suffix) {
    return str.indexOf(suffix, str.length - suffix.length) !== -1;
}

/*
  Get a list of direct child elements by class name.
*/
function childrenByClass(element, name) {
  var filtered = [];

  for (var i = 0; i < element.children.length; i++) {
    var child = element.children[i];
    var classNames = child.className.split(' ');
    if (classNames.indexOf(name) !== -1) {
      filtered.push(child);
    }
  }

  return filtered;
}

/*
  Get an array [width, height] of the window.
*/
function getWindowDimensions() {
  var w = window,
      d = document,
      e = d.documentElement,
      g = d.body,
      x = w.innerWidth || e.clientWidth || g.clientWidth,
      y = w.innerHeight || e.clientHeight || g.clientHeight;

  return [x, y];
}

/*
  Collapse or show a request/response example.
*/
function toggleCollapseButton(event) {
    var button = event.target.parentNode;
    var content = button.parentNode.nextSibling;
    var inner = content.children[0];

    if (button.className.indexOf('collapse-button') === -1) {
      // Clicked without hitting the right element?
      return;
    }

    if (content.style.maxHeight && content.style.maxHeight !== '0px') {
        // Currently showing, so let's hide it
        button.className = 'collapse-button';
        content.style.maxHeight = '0px';
    } else {
        // Currently hidden, so let's show it
        button.className = 'collapse-button show';
        content.style.maxHeight = inner.offsetHeight + 12 + 'px';
    }
}

function toggleTabButton(event) {
    var i, index;
    var button = event.target;

    // Get index of the current button.
    var buttons = childrenByClass(button.parentNode, 'tab-button');
    for (i = 0; i < buttons.length; i++) {
        if (buttons[i] === button) {
            index = i;
            button.className = 'tab-button active';
        } else {
            buttons[i].className = 'tab-button';
        }
    }

    // Hide other tabs and show this one.
    var tabs = childrenByClass(button.parentNode.parentNode, 'tab');
    for (i = 0; i < tabs.length; i++) {
        if (i === index) {
            tabs[i].style.display = 'block';
        } else {
            tabs[i].style.display = 'none';
        }
    }
}

/*
  Collapse or show a navigation menu. It will not be hidden unless it
  is currently selected or `force` has been passed.
*/
function toggleCollapseNav(event, force) {
    var heading = event.target.parentNode;
    var content = heading.nextSibling;
    var inner = content.children[0];

    if (heading.className.indexOf('heading') === -1) {
      // Clicked without hitting the right element?
      return;
    }

    if (content.style.maxHeight && content.style.maxHeight !== '0px') {
      // Currently showing, so let's hide it, but only if this nav item
      // is already selected. This prevents newly selected items from
      // collapsing in an annoying fashion.
      if (force || window.location.hash && endsWith(event.target.href, window.location.hash)) {
        content.style.maxHeight = '0px';
      }
    } else {
      // Currently hidden, so let's show it
      content.style.maxHeight = inner.offsetHeight + 12 + 'px';
    }
}

/*
  Refresh the page after a live update from the server. This only
  works in live preview mode (using the `--server` parameter).
*/
function refresh(body) {
    document.querySelector('body').className = 'preload';
    document.body.innerHTML = body;

    // Re-initialize the page
    init();
    autoCollapse();

    document.querySelector('body').className = '';
}

/*
  Determine which navigation items should be auto-collapsed to show as many
  as possible on the screen, based on the current window height. This also
  collapses them.
*/
function autoCollapse() {
  var windowHeight = getWindowDimensions()[1];
  var itemsHeight = 64; /* Account for some padding */
  var itemsArray = Array.prototype.slice.call(
    document.querySelectorAll('nav .resource-group .heading'));

  // Get the total height of the navigation items
  itemsArray.forEach(function (item) {
    itemsHeight += item.parentNode.offsetHeight;
  });

  // Should we auto-collapse any nav items? Try to find the smallest item
  // that can be collapsed to show all items on the screen. If not possible,
  // then collapse the largest item and do it again. First, sort the items
  // by height from smallest to largest.
  var sortedItems = itemsArray.sort(function (a, b) {
    return a.parentNode.offsetHeight - b.parentNode.offsetHeight;
  });

  while (sortedItems.length && itemsHeight > windowHeight) {
    for (var i = 0; i < sortedItems.length; i++) {
      // Will collapsing this item help?
      var itemHeight = sortedItems[i].nextSibling.offsetHeight;
      if ((itemsHeight - itemHeight <= windowHeight) || i === sortedItems.length - 1) {
        // It will, so let's collapse it, remove its content height from
        // our total and then remove it from our list of candidates
        // that can be collapsed.
        itemsHeight -= itemHeight;
        toggleCollapseNav({target: sortedItems[i].children[0]}, true);
        sortedItems.splice(i, 1);
        break;
      }
    }
  }
}

/*
  Initialize the interactive functionality of the page.
*/
function init() {
    var i, j;

    // Make collapse buttons clickable
    var buttons = document.querySelectorAll('.collapse-button');
    for (i = 0; i < buttons.length; i++) {
        buttons[i].onclick = toggleCollapseButton;

        // Show by default? Then toggle now.
        if (buttons[i].className.indexOf('show') !== -1) {
            toggleCollapseButton({target: buttons[i].children[0]});
        }
    }

    var responseCodes = document.querySelectorAll('.example-names');
    for (i = 0; i < responseCodes.length; i++) {
        var tabButtons = childrenByClass(responseCodes[i], 'tab-button');
        for (j = 0; j < tabButtons.length; j++) {
            tabButtons[j].onclick = toggleTabButton;

            // Show by default?
            if (j === 0) {
                toggleTabButton({target: tabButtons[j]});
            }
        }
    }

    // Make nav items clickable to collapse/expand their content.
    var navItems = document.querySelectorAll('nav .resource-group .heading');
    for (i = 0; i < navItems.length; i++) {
        navItems[i].onclick = toggleCollapseNav;

        // Show all by default
        toggleCollapseNav({target: navItems[i].children[0]});
    }
}

// Initial call to set up buttons
init();

window.onload = function () {
    autoCollapse();
    // Remove the `preload` class to enable animations
    document.querySelector('body').className = '';
};
</script></body></html>
