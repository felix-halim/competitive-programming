#include <stdio.h>
#include <vector>

using namespace std;

#define REP(i,n) for (int i=0,_n=n; i<_n; i++)
#define H(r) ((r)==-1? 0 : node[r].height)
#define S(r) ((r)==-1? 0 : node[r].size)
#define MAXN 200000 // there can be up to 2 trees of size 100000

struct Node {
    int label;      // this node label (acquired from the input).
    int size;       // the size of this subtree (leaf's size is 1).
    int height;     // the height of this node (leaf's height is 1).
    int L, R;       // the index of the left and right child of this node.
} node[MAXN];

vector<int> fnode;  // free node indices (no pointers needed :)

void update(int r){     // update node r's attributes based on its children
    Node &n = node[r];
    n.size = S(n.L) + S(n.R) + 1;
    n.height = 1 + max(H(n.L), H(n.R));
}

void add(int &root, int label){ // insert a new node with the specified label
    if (root==-1){
        root = fnode.back(); fnode.pop_back();          // take a free node
        node[root] = (Node){ label, 1, 1, -1, -1 };     // fill in the new node
    } else {
        Node &n = node[root];
        if (n.label == label) return; // label already exists, ignore add
        if (label < n.label){
            add(n.L, label);
            if (H(n.L) > H(n.R)+1){ // rotate right
                int t = node[n.L].R;
                node[n.L].R = root, root = n.L, n.L = t;
                update(node[root].R);
            }
        } else if (label > n.label){
            add(n.R, label);
            if (H(n.L)+1 < H(n.R)){ // rotate left
                int t = node[n.R].L;
                node[n.R].L = root, root = n.R, n.R = t;
                update(node[root].L);
            }
        }
        update(root);
    }
}

int kth(int root, int k){
    Node &n = node[root];
    if (S(n.L) > k) return kth(n.L, k);
    if (S(n.L) == k) return n.label;
    return kth(n.R, k - S(n.L) - 1);
}

void addAll(int r, int &to){    // add all nodes in 'r' to 'to'
    if (r == -1) return;
    addAll(node[r].L, to);
    addAll(node[r].R, to);
    add(to, node[r].label);
}

void removeAll(int r){      // free all nodes in 'r'
    if (r == -1) return;
    removeAll(node[r].L);
    removeAll(node[r].R);
    fnode.push_back(r);     // r is free, claim back the index
}

vector<int> con[MAXN], qk[MAXN], qi[MAXN];
int T,N,Q,L,a,b,k,x, ans[MAXN], label[MAXN];

int dfs(int x){
    int root = -1; // new tree
    REP(i,con[x].size()) if (x || con[x][i]){ // avoid 0's parent
        int r = dfs(con[x][i]);
        if (S(root) < S(r)) swap(root,r);   // pick the largest tree as the root
        addAll(r, root);    // transfer r's nodes to root's
        removeAll(r);       // delete unused tree
    }
    add(root,label[x]);     // post order insert
    REP(i,qk[x].size())     // answer all queries for node x (this node)
        ans[qi[x][i]] = kth(root, qk[x][i] - 1);
    return root;
}

int main(){
    REP(i,MAXN) fnode.push_back(i); // setup free indices
    scanf("%d",&T);
    REP(t,T){
        scanf("%d %d",&N,&Q);
        REP(i,N) con[i].clear(), qk[i].clear(), qi[i].clear(), scanf("%d",&label[i]);
        REP(a,N) scanf("%d",&b), con[b].push_back(a);
        REP(i,Q) scanf("%d %d",&k,&x), qk[x].push_back(k), qi[x].push_back(i);
        int root = dfs(0);  // traverse tree, and answer queries
        removeAll(root);    // delete tree
        printf("Case #%d:\n",t+1);
        REP(i,Q) printf("%d\n",ans[i]);
    }
}
