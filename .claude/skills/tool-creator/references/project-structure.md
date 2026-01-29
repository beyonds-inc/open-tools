# beyondS ツール プロジェクト構造

## ディレクトリ構成

```
/Users/taka/www/beyonds/tool/
├── index.html          # ツール一覧ページ
├── main.css            # 共通CSS
├── boilerplate.html    # ツール雛形
├── images/             # ロゴ等
│   └── yoko_blue_mini.png
├── js/
│   ├── footer.js       # フッター生成
│   ├── vue.min.js      # Vue.js (リアクティブ系ツール用)
│   ├── moment.min.js
│   ├── moment-with-locales.min.js
│   └── marked.umd.js
└── [各ツールHTML]
```

## index.html のカテゴリセクション

3つのカテゴリに分かれている:

| セクションID | カテゴリ名 | 説明 |
|---|---|---|
| `#util` | 便利ツール | 日付計算や文字種変換など |
| `#dev` | プログラミング向け | ソース整形やデータ変換など |
| `#web` | ウェブ制作向け | タグ変換や文字数チェックなど |

## index.html カード構造

```html
<article class="card">
  <h3>ツール名</h3>
  <p>説明文。</p>
  <a class="cta" href="filename.html">開く →</a>
</article>
```

PHP等の特殊技術を使う場合はpillバッジを付ける:

```html
<article class="card">
  <span class="pill">PHP</span>
  <h3>ツール名</h3>
  <p>説明文。</p>
  <a class="cta" href="filename.php">開く →</a>
</article>
```

## 利用可能なCSSクラス

### レイアウト
- `.container` - 最大幅1100pxの中央揃えコンテナ
- `.page` - メインコンテンツのパディング
- `.section` - セクション間のマージン
- `.surface` - カード風の背景 (白背景、ボーダー、シャドウ)
- `.hero` - ヒーローセクション (グラデーション背景)

### ツールUI
- `.tool-panel` - ツール入出力のグリッドコンテナ
- `.stack` - 縦方向のフレックスレイアウト (gap: 12px)
- `.inline-controls` - ボタン等の横並び配置
- `.two-col` - 2カラムレスポンシブグリッド
- `.date-controls` / `.date-unit` - 日付入力グループ
- `.scroll-area` - スクロール可能エリア (max-height: 420px)

### ボタン
- `.btn .btn-primary` - プライマリボタン (青)
- `.btn .btn-ghost` - ゴーストボタン (白、ボーダー)

### テキスト
- `.note` - 補足テキスト (小さめ、グレー)
- `.pill` - インラインバッジ

### カード (index.html用)
- `.card-grid` - カードのレスポンシブグリッド
- `.card` - クリック可能なカード

## JS ライブラリ

| ファイル | 用途 |
|---|---|
| `./js/footer.js` | 全ページ必須。フッター自動生成 |
| `./js/vue.min.js` | リアクティブUIが必要な場合 |
| `./js/moment-with-locales.min.js` | 日付操作が必要な場合 |
| `./js/marked.umd.js` | Markdown表示が必要な場合 |
