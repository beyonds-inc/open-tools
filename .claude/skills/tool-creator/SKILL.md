---
name: tool-creator
description: beyondS Webツール集に新しいツールページを作成する。boilerplate.htmlを雛形にHTMLファイルを生成し、index.htmlのカードグリッドにもエントリを追加する。ユーザーが「新しいツールを作りたい」「ツールを追加して」「○○変換ツールを作って」など、beyondSツール集への新規ツール追加を依頼した場合に使用する。
---

# beyondS ツール作成

beyondS Webツール集に新しいツールページを作成するワークフロー。

## ワークフロー

### 1. 要件確認

AskUserQuestionツールを使って以下を確認する:

- **ツール名** (日本語): タイトルとindex.htmlカードに使う
- **ファイル名**: `xxx.html` 形式 (英数字、拡張子html)
- **カテゴリ**: `util`(便利ツール) / `dev`(プログラミング向け) / `web`(ウェブ制作向け) のいずれか
- **ツール概要**: 1文での説明 (index.htmlカードとmeta descriptionに使う)
- **UIパターン**: 入力→変換→出力 / リアルタイム更新 / Vue.jsリアクティブ / その他

必要に応じて追加質問:
- 入出力の形式
- 使用するJSライブラリ (Vue.js, Moment.js等)
- 特別なUI要素の要否

### 2. HTMLファイル作成

`assets/boilerplate.html` を雛形として使用する。

**必須の変更箇所:**

```
<title>ツールタイトル | beyondS</title>          → 実際のタイトルに
<meta name="description" content="...">          → 実際の概要に
<h1>ツールタイトル</h1>                           → 実際のタイトルに
<p>このページで提供するツールの説明...</p>         → 実際の説明に
<h2>ツールセクション見出し</h2>                    → 実際の見出しに
```

**tool-panel内のUI:** ツールの要件に応じて自由に構成する。利用可能なCSSクラスやUIパターンの詳細は `references/project-structure.md` を参照。

**レイアウトの原則:**

- フォーム要素はなるべく横1列に並べる。入力(input)行と出力(output)行を分ける
- 横並びにはページ内 `<style>` で `display: flex` の行コンテナを使う
- `align-items: flex-end` で入力欄の底辺を揃え、ラベルなし要素には `<label class="label-spacer">&nbsp;</label>` で高さを合わせる
- モバイル(640px以下)では `flex-direction: column` にフォールバックし、`.label-spacer` は `display: none` にして無駄な空白を消す

```html
<!-- レイアウト例 -->
<style>
  .input-row {
    display: flex;
    gap: 16px;
    align-items: flex-end;
  }
  .input-row .stack { flex: 1; }
  @media (max-width: 640px) {
    .input-row { flex-direction: column; align-items: stretch; }
    .input-row .label-spacer { display: none; }
  }
</style>

<div class="tool-panel">
  <div class="input-row">
    <div class="stack">
      <label for="field1">ラベル1</label>
      <input type="text" id="field1">
    </div>
    <div class="stack">
      <label class="label-spacer">&nbsp;</label>
      <!-- ラベル不要な要素 -->
    </div>
  </div>
  <div class="output-row">
    <div class="stack">
      <label for="result">結果</label>
      <input type="text" id="result" readonly>
    </div>
  </div>
</div>
```

**JavaScript:** `</main>` の後、`<footer>` の前に `<script>` タグで記述する。

```html
  </main>

  <footer class="site-footer" id="site-footer"></footer>
  <script>
    // ツールのロジックをここに
  </script>
  <script src="./js/footer.js"></script>
</body>
```

Vue.js等のライブラリが必要な場合は、ツール固有の `<script>` より前に読み込む:

```html
  <script src="./js/vue.min.js"></script>
  <script src="./js/moment-with-locales.min.js"></script>
  <script>
    var app = new Vue({ ... });
  </script>
  <script src="./js/footer.js"></script>
```

**出力先:** プロジェクトルート直下に `[ファイル名].html` として配置する。

### 3. index.html にカード追加

プロジェクトルートの `index.html` の該当カテゴリセクション内の `<div class="card-grid">` の末尾に追加:

```html
          <article class="card">
            <h3>ツール名</h3>
            <p>説明文。</p>
            <a class="cta" href="filename.html">開く →</a>
          </article>
```

カテゴリとセクションIDの対応:
- 便利ツール → `id="util"`
- プログラミング向け → `id="dev"`
- ウェブ制作向け → `id="web"`

### 4. 動作確認

作成したHTMLファイルを Read ツールで読み返し、以下を確認:
- HTMLの構文が正しいこと
- title, meta description, h1が正しく設定されていること
- footer.jsが読み込まれていること
- JavaScriptにシンタックスエラーがないこと

## 注意事項

- 全ページ共通CSSは `./main.css` (編集不要)
- フッターは `./js/footer.js` で自動生成される (必ず読み込むこと)
- ファビコンは `./images/yoko_blue_mini.png`
- ヘッダーナビのリンク先は `./index.html#util` `./index.html#dev` `./index.html#web`
- ブラウザ完結型ツール (データはサーバーに送信しない) が基本方針
- テキストの冗長な補足(例: 技術的な実装説明)はユーザーに不要な場合が多いので入れない

## リソース

- `assets/boilerplate.html` - ツールページの雛形HTML
- `references/project-structure.md` - プロジェクト構造、CSSクラス一覧、JSライブラリ情報
