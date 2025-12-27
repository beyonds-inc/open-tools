# beyondS Open Tools

beyondSが提供する、ブラウザで動く小さなWebツール集です。
HTML + CSS + JavaScript（必要に応じてPHP）で構成されています。

- 公開サイト: https://tool.beyonds.ai/

## 使い方

- 基本: 直接ファイルを開く
  - `file:///path/to/repo/index.html`
- PHPページを使う場合
  - `php -S 0.0.0.0:8000`
  - `http://localhost:8000/` を開く

## ルール（簡易）

- 追加ツールはルート直下に `tool-name.html`
- 共通スタイルは `main.css`
- フッターは `js/footer.js` で自動挿入

## ライセンス

MIT License

powered by beyondS,Inc.
