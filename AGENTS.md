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

## マイルストーン（Issue / PR で必須）

- Issue と PR は**作成時に必ずマイルストーンを設定する**（未設定のまま作成しない）。beyondS 全リポジトリ共通ルール（2026-09）。
- 紐づけ先が未確定なら `マイルストーン未定` を設定し、確定後に付け替える。`マイルストーン未定` が無いリポジトリでは先に作成する（`gh api repos/{owner}/{repo}/milestones -f title='マイルストーン未定'`）。
- PR は関連 Issue と同じマイルストーンにする。
- `gh` の例: 作成時 `gh issue create -m "<マイルストーン名>"` / `gh pr create -m "<マイルストーン名>"`、後付け `gh issue edit <番号> -m "<マイルストーン名>"` / `gh pr edit <番号> -m "<マイルストーン名>"`。

## Security & Configuration Tips
- 外部入力を扱う場合はサニタイズを行い、失敗時のフォールバックを用意します。
- 外部 API を追加する場合は定数で管理し、HTTPS を使用します。

<!-- ▼▼▼ beyonds-claude-guardrails: ここから AGENTS.md / CLAUDE.md に貼り付け ▼▼▼ -->

## ガードレール（全 AI エージェント共通の禁止事項）

以下は Claude Code / Devin / Codex / Copilot / Cursor すべてに適用する。`.claude/settings.json` の
`permissions.deny` と PreToolUse hook（`block-dangerous-bash.sh`）が一部を機械的に強制するが、
機械判定できない操作は本セクションで明文化する。

### 禁止（機械強制 + 明文）

- 機密値（環境変数 / トークン / API 鍵 / パスワード）を標準出力・ログ・コメント・PR・コミットメッセージに出力しない。
- `.env*`（テンプレ `.env.example(.*)` / `.env.sample(.*)` / `.env.dist` / `*.public.env` を除く）/ 証明書（`*.pem` `*.key` `*.p12` `*.pfx`）/ `auth.json` / `credentials.json` の変更・コミットをしない。
- `main` への直接 push、force push（`--force-with-lease` を除く）、`--no-verify` をしない。
- 破壊的 DB 操作（`DROP` / `TRUNCATE` / `WHERE` 無し `DELETE` / `ALTER ... DROP`）を人間の承認なしに実行しない。
- 本番環境への操作（`migrate --force` / デプロイ / `supervisorctl` / 本番 DB 接続での書込）を人間の承認なしに実行しない。

### 高リスク操作チェックリスト（本番・DB・破壊操作の前に必ず通す）

1. **宣言**: 何をするかを 1 文で明示する。
2. **影響範囲**: 対象（環境 / テーブル / ファイル）と巻き戻し可否を特定する。
3. **バックアップ**: DB ダンプ / git コミット等の復旧手段があるか確認する。
4. **検証**: staging / dev で先に試す。
5. **承認**: 人間の明示的な GO を得る。
6. **実行**: 上記が揃ってから実行し、結果を報告する。

<!-- ▲▲▲ beyonds-claude-guardrails: ここまで ▲▲▲ -->
