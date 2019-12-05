# 仮想環境レビュー課題

## 条件

- `src` の中身の編集禁止
- Docker や Vagrant+VirtualBox での構築

---

## 合格基準

### レベル 1 （必須）

- 同時に 2 つのウェブサーバーを VM で動かせる
- PHP version `7.2`
- Apache で `project1` を `http://localhost:8282` でアクセスできる
- Nginx 用 `project2` を `http://localhost:8383` でアクセスできる

### レベル 2 （任意）

- `project1` は `mysql 5.7`（或いは `mariadb 10.3`）への接続が成功
- `project2` は `postgresql 11` への接続が成功
- データーベースの `username giztech`
- データーベースの `password gizumo`
- データーベースの `database project1` もしくは `database project2`

### チャレンジレベル （任意）

- 同じ VM（コンテナ）でレベル 1＆2 の基準すべてを満たす
- 時間を持て余してなければチャレンジはおすすめできない
- データーベースのホストは`mysql`、`mariadb`、`postgres`なので ローカル DNS の修正を忘れずに

---

## レビュー方法

完成したら 2 つのブラウザが横並び表示してるスクリーンショットをアップロード

チャレンジレベルの確認は別途連絡

---

### 着手する前にちょっと読みたい FYI

#### Docker 使用する人へ

- Docker は常に楽したい（効率的な）エンジンなので仕事がなければ（できなければ）コンテナは Exit になり down する
- 同じビルドコマンド（文字列や変数名さえ同じなら中身がどうなっても同一視）で実行する場合は常に昔使った cache を再利用する

#### Vagrant 使用する人へ

- OS は指定されてないから別にカリキュラムで使用した CentOS ではなくてもよい
- 理由がなく VM がおかしくなってる場合は reload はよく効く
- Docker より難しいかもしれないけど頑張れ

#### 楽したい人へ

- Vagrant と Docker 両方使うのが一番簡単な方法
- Docker の Laradock を使うのが一番手取り早い方法

#### Windows Home の人へ

- 一番楽な道はないが知識とスキルがきちんと身に付けられることを保証する