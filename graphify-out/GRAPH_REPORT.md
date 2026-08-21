# Graph Report - portfolio  (2026-08-21)

## Corpus Check
- 137 files · ~195,382 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 5750 nodes · 18736 edges · 160 communities (150 shown, 10 thin omitted)
- Extraction: 88% EXTRACTED · 12% INFERRED · 0% AMBIGUOUS · INFERRED: 2300 edges (avg confidence: 0.85)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `2c82da94`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- code-editor.js
- rich-editor.js
- components/chart.js
- constructor
- i
- stat/chart.js
- .forEach
- draw
- addProseMirrorPlugins
- g$
- _update
- advance
- markdown-editor.js
- fromObject
- resolve
- e
- support.js
- o
- n
- updateElements
- updateElements
- User
- id
- get
- _update
- CategoryResource.php
- constructor
- echo.js
- create
- .slice
- draw
- columns/select.js
- i
- T
- slice
- tables.js
- O
- notifications.js
- y
- te
- fn
- find
- domSelectionRange
- parse
- Xt
- Xt
- Tip
- ne
- Filament\Tables\Table
- Cn
- parse
- renderOptions
- Filament\Schemas\Schema
- slider.js
- add
- of
- buildTicks
- Ue
- qt
- Ji
- _each
- ShareTip
- Illuminate\Database\Migrations\Migration
- match
- getProps
- ir
- ar
- lP
- components/select.js
- get
- eq
- getDatasetMeta
- filament/app.js
- file-upload.js
- AdminPanelProvider.php
- md
- devDependencies
- va
- getMeta
- e
- Y
- closeDropdown
- selectRecords
- TipDetailController.php
- color-picker.js
- scripts
- fn
- UserFactory.php
- composer.json
- ut
- date-time-picker.js
- oe
- selectOption
- renderOptions
- actions/actions.js
- ot
- schemas.js
- En
- README.md
- AppServiceProvider.php
- require-dev
- setup
- X
- 🤖 AGENTS.md - Contexto Técnico (Portfólio Scheleder)
- config
- rl
- Nn
- TestCase
- xl
- St
- ve
- components/actions.js
- psr-4
- require
- logging.php
- clickPercent
- CustomLogin
- post-autoload-dump
- ExampleTest
- c
- Pt
- extra
- console.php
- Controller.php
- clearFilters
- hw
- Um
- techtips-list.blade.php

## God Nodes (most connected - your core abstractions)
1. `constructor()` - 151 edges
2. `update()` - 143 edges
3. `resolve()` - 97 edges
4. `y()` - 93 edges
5. `_update()` - 87 edges
6. `_update()` - 86 edges
7. `node()` - 78 edges
8. `User` - 75 edges
9. `te()` - 74 edges
10. `constructor()` - 73 edges

## Surprising Connections (you probably didn't know these)
- `TechTipsTest` --references--> `Tip`  [EXTRACTED]
  tests/Feature/TechTipsTest.php → app/Models/Tip.php
- `Rd()` --indirect_call--> `Wi()`  [INFERRED]
  public/js/filament/forms/components/code-editor.js → public/js/filament/forms/components/rich-editor.js
- `VariableDefinition()` --indirect_call--> `Zx()`  [INFERRED]
  public/js/filament/forms/components/code-editor.js → public/js/filament/forms/components/rich-editor.js
- `addInputRules()` --indirect_call--> `cw()`  [INFERRED]
  public/js/filament/forms/components/rich-editor.js → public/js/filament/forms/components/code-editor.js
- `[x]()` --indirect_call--> `H()`  [INFERRED]
  public/js/filament/forms/components/color-picker.js → public/js/filament/forms/components/markdown-editor.js

## Import Cycles
- None detected.

## Communities (160 total, 10 thin omitted)

### Community 0 - "code-editor.js"
Cohesion: 0.01
Nodes (138): Ac(), addActive(), addChanges(), addCompletion(), addCompletions(), addNamespace(), addNamespaceObject(), addSelection() (+130 more)

### Community 1 - "rich-editor.js"
Cohesion: 0.01
Nodes (185): $0(), ac(), addAttributes(), addExtensions(), addHackNode(), addNode(), addTextblockHacks(), af() (+177 more)

### Community 2 - "components/chart.js"
Cohesion: 0.01
Nodes (122): aa(), abutsStart(), addControllers(), addPlugins(), addScales(), afterDraw(), ah(), bd() (+114 more)

### Community 3 - "constructor"
Cohesion: 0.02
Nodes (209): accept(), active(), addChunk(), addEventListener(), addInfoPane(), addInner(), addRange(), addWindowListeners() (+201 more)

### Community 4 - "i"
Cohesion: 0.04
Nodes (148): aa(), add(), addElement(), Ah(), AQ(), attrs(), AX(), B() (+140 more)

### Community 5 - "stat/chart.js"
Cohesion: 0.02
Nodes (85): ac(), acquireContext(), as(), bl(), color(), _createItems(), darken(), data() (+77 more)

### Community 6 - ".forEach"
Cohesion: 0.04
Nodes (121): _a(), addInner(), addNodeView(), ag(), c(), d(), Ar(), b0() (+113 more)

### Community 7 - "draw"
Cohesion: 0.04
Nodes (124): acquireContext(), adjustHitBoxes(), Ao(), aspectRatio(), bh(), Bt(), calculateLabelRotation(), _calculatePadding() (+116 more)

### Community 8 - "addProseMirrorPlugins"
Cohesion: 0.04
Nodes (118): addCommands(), addGlobalAttributes(), addInputRules(), addKeyboardShortcuts(), addMark(), addProseMirrorPlugins(), addStoredMark(), An() (+110 more)

### Community 9 - "g$"
Cohesion: 0.03
Nodes (118): acceptToken(), allows(), aO(), atLastNode(), au(), bi(), charCategorizer(), child() (+110 more)

### Community 10 - "_update"
Cohesion: 0.03
Nodes (114): addBox(), addElements(), afterBuildTicks(), afterCalculateLabelRotation(), afterDataLimits(), afterDatasetsUpdate(), afterFit(), afterSetDimensions() (+106 more)

### Community 11 - "advance"
Cohesion: 0.03
Nodes (106): addActions(), addChild(), addGaps(), addLeafElement(), addNode(), advance(), advanceFully(), advanceStack() (+98 more)

### Community 12 - "markdown-editor.js"
Cohesion: 0.04
Nodes (98): ad(), af(), ai(), al(), An(), ao(), Ba(), bf() (+90 more)

### Community 13 - "fromObject"
Cohesion: 0.04
Nodes (105): ac(), ae(), after(), ag(), Al(), Am(), before(), bl() (+97 more)

### Community 14 - "resolve"
Cohesion: 0.06
Nodes (96): ad(), after(), as(), Ay(), bc(), before(), between(), blockRange() (+88 more)

### Community 15 - "e"
Cohesion: 0.06
Nodes (87): add(), ak(), allowsMarks(), Ap(), apply(), applyInner(), applyTransaction(), bk() (+79 more)

### Community 16 - "support.js"
Cohesion: 0.04
Nodes (71): n(), apply(), as(), bo(), bs(), close(), closeQuietly(), co() (+63 more)

### Community 17 - "o"
Cohesion: 0.05
Nodes (76): beforeLayout(), _d(), jm(), xf(), r(), bc(), beforeLayout(), bh() (+68 more)

### Community 18 - "n"
Cohesion: 0.09
Nodes (73): _a(), Ae(), ar(), as(), bc(), ue(), u(), ci() (+65 more)

### Community 19 - "updateElements"
Cohesion: 0.04
Nodes (75): addEventListener(), afterAutoSkip(), au(), bindResponsiveEvents(), bindUserEvents(), br(), buildLookupTable(), _calculateBarIndexPixels() (+67 more)

### Community 20 - "updateElements"
Cohesion: 0.05
Nodes (75): afterAutoSkip(), Ao(), applyStack(), Ar(), buildLookupTable(), buildTicks(), _calculateBarIndexPixels(), _calculateBarValuePixels() (+67 more)

### Community 21 - "User"
Cohesion: 0.05
Nodes (20): StatsOverviewWidget, Category, Subcategory, HasMany, User, CategoryPolicy, SubcategoryPolicy, UserPolicy (+12 more)

### Community 22 - "id"
Cohesion: 0.07
Nodes (69): addNodeMark(), allowedMarks(), append(), au(), canAppend(), canReplace(), clearIncompatible(), close() (+61 more)

### Community 23 - "get"
Cohesion: 0.05
Nodes (69): addBlockWidget(), addBreak(), addComposition(), addDelimiter(), addInlineWidget(), addLine(), addLineStart(), addLineStartIfNotCovered() (+61 more)

### Community 24 - "_update"
Cohesion: 0.05
Nodes (69): afterBuildTicks(), afterCalculateLabelRotation(), afterDataLimits(), afterDraw(), afterFit(), afterSetDimensions(), afterTickToLabelConversion(), afterUpdate() (+61 more)

### Community 25 - "CategoryResource.php"
Cohesion: 0.06
Nodes (32): CategoryResource, UnitEnum, CreateCategory, EditCategory, ListCategories, CreateSubcategory, EditSubcategory, ListSubcategories (+24 more)

### Community 26 - "constructor"
Cohesion: 0.04
Nodes (66): alpha(), Bc(), Be(), bg(), $c(), chartOptionScopes(), co(), color() (+58 more)

### Community 27 - "echo.js"
Cohesion: 0.05
Nodes (48): a(), ar(), b(), Be(), Ce(), cr(), d(), De() (+40 more)

### Community 28 - "create"
Cohesion: 0.04
Nodes (66): Cl(), clone(), create(), Dl(), dtFormatter(), Ec(), eras(), expandFormat() (+58 more)

### Community 29 - ".slice"
Cohesion: 0.05
Nodes (61): accepts(), addMaps(), addOptions(), addPasteRules(), addStep(), addTransform(), Ah(), appendMap() (+53 more)

### Community 30 - "draw"
Cohesion: 0.06
Nodes (64): We(), adjustHitBoxes(), At(), beforeDatasetDraw(), beforeDatasetsDraw(), beforeDraw(), bi(), bo() (+56 more)

### Community 31 - "columns/select.js"
Cohesion: 0.07
Nodes (49): A(), Ae(), Ai(), An(), applyDisabledState(), be(), bn(), Bt() (+41 more)

### Community 32 - "i"
Cohesion: 0.07
Nodes (57): $a(), apply(), B(), Ba(), ca(), Ci(), createResolver(), dc() (+49 more)

### Community 33 - "T"
Cohesion: 0.05
Nodes (57): _a(), aa(), ae(), alpha(), ba(), br(), Bt(), ca() (+49 more)

### Community 34 - "slice"
Cohesion: 0.05
Nodes (55): addToSet(), applyChanges(), balanced(), cd(), childString(), decompose(), decomposeLeft(), decomposeRight() (+47 more)

### Community 35 - "tables.js"
Cohesion: 0.11
Nodes (50): A(), ae(), B(), be(), C(), ce(), E(), ee() (+42 more)

### Community 36 - "O"
Cohesion: 0.16
Nodes (47): b(), $c(), X(), ca(), me(), D(), _e(), f() (+39 more)

### Community 37 - "notifications.js"
Cohesion: 0.06
Nodes (31): actions(), button(), c(), close(), configureAnimations(), configureTransitions(), constructor(), danger() (+23 more)

### Community 38 - "y"
Cohesion: 0.17
Nodes (51): Dg(), Ig(), Se(), at(), Be(), Cr(), Ct(), de() (+43 more)

### Community 39 - "te"
Cohesion: 0.05
Nodes (9): Ud(), Bi(), Bn(), ji(), qd(), te(), Vi(), Xc() (+1 more)

### Community 40 - "fn"
Cohesion: 0.14
Nodes (47): _a(), m(), O(), x(), aa(), Ai(), c(), d() (+39 more)

### Community 41 - "find"
Cohesion: 0.06
Nodes (47): activateHover(), baseDirAt(), bd(), Bh(), bidiIn(), bidiSpans(), bidiSpansAt(), checkHover() (+39 more)

### Community 42 - "domSelectionRange"
Cohesion: 0.06
Nodes (45): Bd(), cg(), coordsAtPos(), $d(), dg(), domAfterPos(), domFromPos(), domSelection() (+37 more)

### Community 43 - "parse"
Cohesion: 0.08
Nodes (45): buildOrUpdateElements(), buildOrUpdateScales(), D(), determineDataLimits(), dh(), diff(), ds(), En() (+37 more)

### Community 44 - "Xt"
Cohesion: 0.13
Nodes (43): At(), b(), bi(), bn(), Ce(), ci(), cn(), ct() (+35 more)

### Community 45 - "Xt"
Cohesion: 0.13
Nodes (43): At(), b(), bi(), Ce(), ci(), cn(), ct(), di() (+35 more)

### Community 46 - "Tip"
Cohesion: 0.08
Nodes (12): TipsByCategoryChart, TipsByTypeChart, TipsByUserChart, Tip, TipImage, TipPolicy, Filament\Widgets\ChartWidget, Illuminate\Database\Eloquent\Model (+4 more)

### Community 47 - "ne"
Cohesion: 0.09
Nodes (40): Ei(), Ac(), bl(), ee(), ce(), cl(), Dc(), Do() (+32 more)

### Community 48 - "Filament\Tables\Table"
Cohesion: 0.09
Nodes (24): CategoriesTable, SubcategoriesTable, ImagesRelationManager, TipsTable, UsersTable, MostViewedTipsTable, Filament\Actions\AssociateAction, Filament\Actions\BulkActionGroup (+16 more)

### Community 49 - "Cn"
Cohesion: 0.15
Nodes (38): Cn(), b(), Be(), Ce(), De(), dn(), _e(), F() (+30 more)

### Community 50 - "parse"
Cohesion: 0.09
Nodes (40): addAll(), addDOM(), addElement(), addElementByRule(), addTextNode(), addToSet(), allowsMarkType(), am() (+32 more)

### Community 51 - "renderOptions"
Cohesion: 0.12
Nodes (40): addBadgesForSelectedOptions(), addSingleBadge(), addSingleSelectionDisplay(), closeDropdown(), constructor(), createBadgeElement(), createOptionElement(), createRemoveButton() (+32 more)

### Community 52 - "Filament\Schemas\Schema"
Cohesion: 0.08
Nodes (21): CustomEditProfile, CustomRegister, CategoryForm, SubcategoryForm, TipForm, UserForm, Filament\Actions\Action, Filament\Auth\Http\Responses\Contracts\RegistrationResponse (+13 more)

### Community 53 - "slider.js"
Cohesion: 0.11
Nodes (34): We(), ar(), Be(), Ce(), De(), _e(), Ee(), er() (+26 more)

### Community 54 - "add"
Cohesion: 0.08
Nodes (37): active(), add(), _animateOptions(), average(), _cachedScopes(), cancel(), ci(), _createAnimations() (+29 more)

### Community 55 - "of"
Cohesion: 0.07
Nodes (34): baseTheme(), bu(), define(), domEventHandlers(), domEventObservers(), dr(), Fe(), findWidget() (+26 more)

### Community 56 - "buildTicks"
Cohesion: 0.08
Nodes (35): af(), at(), Bf(), buildTicks(), determineDataLimits(), df(), Fa(), ff() (+27 more)

### Community 57 - "Ue"
Cohesion: 0.11
Nodes (34): Ax(), bx(), c(), ct(), dx(), ex(), Fh(), Gh() (+26 more)

### Community 58 - "qt"
Cohesion: 0.14
Nodes (33): ae(), B(), Ft(), He(), Me(), wt(), xe(), Zt() (+25 more)

### Community 59 - "Ji"
Cohesion: 0.18
Nodes (31): br(), Bt(), Ca(), ct(), Da(), Ea(), ei(), Fi() (+23 more)

### Community 60 - "_each"
Cohesion: 0.08
Nodes (31): addControllers(), addElements(), addPlugins(), addScales(), buildOrUpdateControllers(), Ce(), _checkEventBindings(), _dataCheck() (+23 more)

### Community 61 - "ShareTip"
Cohesion: 0.15
Nodes (13): TipViewed, IncrementTipViewCount, NewUserRegistered, ShareTip, UserAccessApproved, UserPasswordReset, Illuminate\Bus\Queueable, Illuminate\Foundation\Events\Dispatchable (+5 more)

### Community 62 - "Illuminate\Database\Migrations\Migration"
Cohesion: 0.10
Nodes (3): Illuminate\Database\Migrations\Migration, Illuminate\Database\Schema\Blueprint, Illuminate\Support\Facades\Schema

### Community 63 - "match"
Cohesion: 0.10
Nodes (30): between(), d0(), De(), E$(), f0(), findIndex(), getCursor(), gotoInner() (+22 more)

### Community 64 - "getProps"
Cohesion: 0.09
Nodes (30): active(), ad(), _animateOptions(), applyStack(), average(), _createAnimations(), first(), getCenterPoint() (+22 more)

### Community 65 - "ir"
Cohesion: 0.15
Nodes (27): ir(), at(), be(), ce(), Ct(), ee(), Et(), ge() (+19 more)

### Community 66 - "ar"
Cohesion: 0.09
Nodes (29): ar(), beforeDatasetDraw(), beforeDatasetsDraw(), beforeDraw(), bu(), dataset(), _drawDataset(), _drawDatasets() (+21 more)

### Community 67 - "lP"
Cohesion: 0.10
Nodes (28): changeByRange(), changes(), ff(), iterChangedRanges(), iterLines(), iterRange(), IX(), JQ() (+20 more)

### Community 68 - "components/select.js"
Cohesion: 0.11
Nodes (17): be(), Bt(), ei(), en(), gt(), jn(), Ln(), ni() (+9 more)

### Community 69 - "get"
Cohesion: 0.11
Nodes (27): add(), bi(), bo(), bs(), _cachedScopes(), Ch(), Ct(), describe() (+19 more)

### Community 70 - "eq"
Cohesion: 0.11
Nodes (26): a$(), activeForPoint(), addBlock(), addLineDeco(), blankContent(), boundChange(), commit(), comparePoint() (+18 more)

### Community 71 - "getDatasetMeta"
Cohesion: 0.11
Nodes (26): themeClasses(), afterDatasetsUpdate(), generateLabels(), getDatasetMeta(), getDataVisibility(), getMaxBorderWidth(), getStyle(), _handleEvent() (+18 more)

### Community 72 - "filament/app.js"
Cohesion: 0.13
Nodes (19): B(), close(), E(), G(), I(), L(), q(), T() (+11 more)

### Community 73 - "file-upload.js"
Cohesion: 0.09
Nodes (9): Vm(), Cg(), getExtension(), om(), pm(), qe(), rm(), vl() (+1 more)

### Community 74 - "AdminPanelProvider.php"
Cohesion: 0.09
Nodes (20): AdminPanelProvider, Filament\Http\Middleware\Authenticate, Filament\Http\Middleware\AuthenticateSession, Filament\Http\Middleware\DisableBladeIconComponents, Filament\Http\Middleware\DispatchServingFilamentEvent, Filament\Pages\Dashboard, Filament\Panel, Filament\PanelProvider (+12 more)

### Community 75 - "md"
Cohesion: 0.13
Nodes (23): cd(), dd(), gl(), Ie(), jl(), ld(), lr(), md() (+15 more)

### Community 76 - "devDependencies"
Cohesion: 0.10
Nodes (19): axios, concurrently, laravel-vite-plugin, devDependencies, axios, concurrently, laravel-vite-plugin, tailwindcss (+11 more)

### Community 77 - "va"
Cohesion: 0.15
Nodes (20): Aa(), da(), fa(), Gr(), Jc(), Kr(), Ln(), ma() (+12 more)

### Community 78 - "getMeta"
Cohesion: 0.13
Nodes (20): Ab(), buildProps(), can(), createCan(), createChain(), dc(), Er(), findDiffEnd() (+12 more)

### Community 79 - "e"
Cohesion: 0.16
Nodes (19): Eo(), addEventListener(), al(), bindEvents(), bindResponsiveEvents(), bindUserEvents(), bs(), cl() (+11 more)

### Community 80 - "Y"
Cohesion: 0.14
Nodes (19): calculateLabelRotation(), cc(), fc(), first(), gc(), Ho(), jo(), lc() (+11 more)

### Community 81 - "closeDropdown"
Cohesion: 0.23
Nodes (17): applyDisabledState(), closeDropdown(), constructor(), destroy(), disable(), enable(), focusNextOption(), focusPreviousOption() (+9 more)

### Community 82 - "selectRecords"
Cohesion: 0.21
Nodes (17): areRecordsSelected(), areRecordsToggleable(), canSelectAllRecords(), deselectAllRecords(), deselectRecords(), getRecordsOnPage(), getSelectedRecordsCount(), handleCheckboxClick() (+9 more)

### Community 83 - "TipDetailController.php"
Cohesion: 0.16
Nodes (8): TipDetailController, UserApprovalController, Illuminate\Foundation\Application, Illuminate\Foundation\Configuration\Exceptions, Illuminate\Foundation\Configuration\Middleware, Illuminate\Http\Request, Illuminate\Support\Facades\Mail, Illuminate\Support\Facades\Route

### Community 84 - "color-picker.js"
Cohesion: 0.13
Nodes (4): [g](), style(), update(), [x]()

### Community 85 - "scripts"
Cohesion: 0.13
Nodes (15): scripts, dev, post-create-project-cmd, post-update-cmd, pre-package-uninstall, test, Composer\\Config::disableProcessTimeout, Illuminate\\Foundation\\ComposerScripts::prePackageUninstall (+7 more)

### Community 86 - "fn"
Cohesion: 0.28
Nodes (15): Ae(), De(), fn(), Ft(), ht(), ii(), Le(), ne() (+7 more)

### Community 87 - "UserFactory.php"
Cohesion: 0.16
Nodes (6): UserFactory, Illuminate\Database\Eloquent\Factories\Factory, Illuminate\Support\Facades\Hash, Illuminate\Support\Str, Pdo\Mysql, static

### Community 88 - "composer.json"
Cohesion: 0.14
Nodes (13): autoload-dev, psr-4, description, keywords, license, minimum-stability, name, prefer-stable (+5 more)

### Community 89 - "ut"
Cohesion: 0.27
Nodes (14): Ft(), de(), Dt(), fe(), ft(), kt(), le(), oe() (+6 more)

### Community 90 - "date-time-picker.js"
Cohesion: 0.26
Nodes (8): d(), e(), i(), m(), r(), s(), t(), rr()

### Community 91 - "oe"
Cohesion: 0.23
Nodes (13): cm(), De(), dm(), Ee(), Ht(), me(), nm(), oe() (+5 more)

### Community 92 - "selectOption"
Cohesion: 0.28
Nodes (13): addBadgesForSelectedOptions(), addSingleBadge(), addSingleSelectionDisplay(), createBadgeElement(), createRemoveButton(), getLabelForSingleSelection(), getLabelsForMultipleSelection(), getSelectedOptionLabel() (+5 more)

### Community 93 - "renderOptions"
Cohesion: 0.37
Nodes (13): createOptionElement(), deferPositionDropdown(), filterOptions(), handleSearch(), hideLoadingState(), openDropdown(), populateLabelRepositoryFromOptions(), positionDropdown() (+5 more)

### Community 94 - "actions/actions.js"
Cohesion: 0.44
Nodes (8): closeModal(), generateModalId(), getActionNestingIndexFromModalId(), init(), openModal(), rememberPreviouslyFocusedElement(), restorePreviouslyFocusedElement(), syncActionModals()

### Community 95 - "ot"
Cohesion: 0.28
Nodes (9): ba(), _e(), It(), jt(), ot(), sa(), tm(), xa() (+1 more)

### Community 97 - "En"
Cohesion: 0.28
Nodes (9): At(), En(), Me(), Hr(), On(), ua(), un(), vr() (+1 more)

### Community 98 - "README.md"
Cohesion: 0.22
Nodes (8): About Laravel, Code of Conduct, Contributing, Laravel Sponsors, Learning Laravel, License, Premium Partners, Security Vulnerabilities

### Community 99 - "AppServiceProvider.php"
Cohesion: 0.29
Nodes (5): AppServiceProvider, Filament\Notifications\Livewire\Notifications, Filament\Support\Enums\Alignment, Filament\Support\Enums\VerticalAlignment, Illuminate\Support\ServiceProvider

### Community 100 - "require-dev"
Cohesion: 0.25
Nodes (8): require-dev, fakerphp/faker, laravel/pail, laravel/pint, laravel/sail, mockery/mockery, nunomaduro/collision, phpunit/phpunit

### Community 101 - "setup"
Cohesion: 0.25
Nodes (8): post-root-package-install, setup, composer install, npm install, npm run build, @php artisan key:generate, @php artisan migrate --force, @php -r \"file_exists('.env') || copy('.env.example', '.env');\

### Community 102 - "X"
Cohesion: 0.32
Nodes (8): A(), An(), e(), ue(), vi(), X(), xn(), wt()

### Community 103 - "🤖 AGENTS.md - Contexto Técnico (Portfólio Scheleder)"
Cohesion: 0.29
Nodes (6): 🤖 AGENTS.md - Contexto Técnico (Portfólio Scheleder), 🏗️ Arquitetura e Padrões, 📝 Estilo de Código, graphify, 🚀 Regras de Deploy e Git, 🔒 Restrições Técnicas

### Community 104 - "config"
Cohesion: 0.29
Nodes (7): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages

### Community 105 - "rl"
Cohesion: 0.33
Nodes (7): Bp(), ca(), Cp(), Dp(), Fp(), kp(), rl()

### Community 106 - "Nn"
Cohesion: 0.33
Nodes (7): ar(), q(), Nn(), sr(), wn(), Xr(), Yt()

### Community 107 - "TestCase"
Cohesion: 0.40
Nodes (3): Illuminate\Foundation\Testing\TestCase, ExampleTest, TestCase

### Community 108 - "xl"
Cohesion: 0.33
Nodes (6): am(), ol(), Op(), Pp(), xl(), yl()

### Community 109 - "St"
Cohesion: 0.33
Nodes (6): constructor(), define(), _getTestState(), getType(), registerListeners(), St()

### Community 110 - "ve"
Cohesion: 0.33
Nodes (6): tn(), ht(), ve(), xe(), yt(), qt()

### Community 112 - "psr-4"
Cohesion: 0.40
Nodes (5): autoload, psr-4, App\\, Database\\Factories\\, Database\\Seeders\\

### Community 113 - "require"
Cohesion: 0.40
Nodes (5): require, filament/filament, laravel/framework, laravel/tinker, php

### Community 114 - "logging.php"
Cohesion: 0.40
Nodes (4): Monolog\Handler\NullHandler, Monolog\Handler\StreamHandler, Monolog\Handler\SyslogUdpHandler, Monolog\Processor\PsrLogMessageProcessor

### Community 115 - "clickPercent"
Cohesion: 0.60
Nodes (5): clickPercent(), getPosition(), mouseUp(), movePlayhead(), timelineClicked()

### Community 117 - "post-autoload-dump"
Cohesion: 0.50
Nodes (4): post-autoload-dump, Illuminate\\Foundation\\ComposerScripts::postAutoloadDump, @php artisan filament:upgrade, @php artisan package:discover --ansi

### Community 119 - "c"
Cohesion: 0.67
Nodes (4): c(), o(), p(), s()

### Community 120 - "Pt"
Cohesion: 0.50
Nodes (4): Ae(), Bt(), Pt(), jt()

### Community 121 - "extra"
Cohesion: 0.67
Nodes (3): extra, laravel, dont-discover

## Knowledge Gaps
- **73 isolated node(s):** `Controller`, `$schema`, `name`, `type`, `description` (+68 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **10 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `jr()` connect `parse` to `T`, `stat/chart.js`, `file-upload.js`, `advance`, `ne`, `o`?**
  _High betweenness centrality (0.031) - this node is a cross-community bridge._
- **Why does `qu()` connect `get` to `code-editor.js`, `i`, `components/chart.js`, `draw`, `file-upload.js`, `_update`?**
  _High betweenness centrality (0.029) - this node is a cross-community bridge._
- **Why does `constructor()` connect `constructor` to `code-editor.js`, `rich-editor.js`, `i`, `draw`, `g$`, `advance`, `markdown-editor.js`, `n`, `get`, `i`, `slice`, `y`, `find`, `ne`, `of`, `Ji`, `match`, `lP`, `va`?**
  _High betweenness centrality (0.028) - this node is a cross-community bridge._
- **Are the 17 inferred relationships involving `constructor()` (e.g. with `a()` and `h()`) actually correct?**
  _`constructor()` has 17 INFERRED edges - model-reasoned connections that need verification._
- **Are the 21 inferred relationships involving `update()` (e.g. with `a()` and `h()`) actually correct?**
  _`update()` has 21 INFERRED edges - model-reasoned connections that need verification._
- **Are the 2 inferred relationships involving `resolve()` (e.g. with `s()` and `i()`) actually correct?**
  _`resolve()` has 2 INFERRED edges - model-reasoned connections that need verification._
- **Are the 19 inferred relationships involving `y()` (e.g. with `$c()` and `D()`) actually correct?**
  _`y()` has 19 INFERRED edges - model-reasoned connections that need verification._