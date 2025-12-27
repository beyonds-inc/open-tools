# Repository Guidelines

## Project Structure & Module Organization
- ルート直下に単体ツールの HTML/PHP を配置します（例: `tag.html`, `csv2json.html`, `tostr.php`）。
- 共通スタイルは `main.css`、フッターは `js/footer.js`、画像は `images/` を使用します。
- 新規ツールは原則 `kebab-case` の `tool-name.html` をルートに作成し、`boilerplate.html` をベースにしてください。

## Build, Test, and Development Commands
- ビルド工程はありません。ブラウザで直接開いて動作確認します。
  - 例: `file:///path/to/repo/index.html`
- PHP ページはローカルサーバーで確認します。
  - 例: `php -S 0.0.0.0:8000` → `http://localhost:8000/`

## Coding Style & Naming Conventions
- HTML5 + UTF-8 を維持し、`boilerplate.html` と同じ head/meta 構成を踏襲します。
- `main.css` のデザイントークン（`--color-primary` など）とユーティリティ（`hero`, `surface`, `tool-panel` など）を優先的に使用します。
- 可能な限りインラインスタイルは避け、共通 CSS を利用します。
- 共有スクリプトを追加する場合は `js/` 配下に配置します。
- フッターは `id="site-footer"` と `js/footer.js` を末尾で読み込んで自動描画します。

## Testing Guidelines
- 手動確認のみ。以下をチェックしてください。
  - 画面幅 320px 以上でのレイアウト崩れ
  - 主要ボタン/フォームの動作
  - JS 追加時のコンソール警告
- PHP ツールはローカルサーバー経由で動作確認。

## Commit & Pull Request Guidelines
- コミットメッセージは短い英語命令形（例: `Add base64 decoder layout`）。
- PR には目的/要約、対象ファイル、手動テスト内容、UI 変更の前後スクショ（可能なら）を含めます。
- 新しい外部依存や API を追加する場合は明記してください。

## Security & Configuration Tips
- 外部入力を扱う場合はサニタイズを行い、失敗時のフォールバックを用意します。
- 外部 API を追加する場合は定数で管理し、HTTPS を使用します。
