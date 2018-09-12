#include <assert.h>
#include <stdio.h>
#include <string.h>
#include <time.h>
#include <algorithm>

using namespace std;

#define REP(i,n) for (int i=0,_n=n; i<_n; i++)

#define MAXA 50000
#define MAXN 100000
#define MAXW 131072
#define MAXQ 800100

struct Node {
  pair<int,int> label;  // this node label
  int size; // the number of nodes in this subtree
  int depth;  // leaf = depth 1
  int L, R; // left and right node index of the size
} node[MAXQ];

int idxs[MAXN], idxs_size;
int fnode[MAXQ], fnode_size;  // free node indices
int next_free_idx;

inline int depth(int r){ return r==-1? 0 : node[r].depth; }

inline void update(int r){
  if (r==-1) return;
  Node &n = node[r];
  n.size =  ((n.L==-1)? 0 : (1 + node[n.L].size)) +
        ((n.R==-1)? 0 : (1 + node[n.R].size));
  n.depth = 1 + max(depth(n.L), depth(n.R));
}

void rotate_right(int &root){
  Node &n = node[root];
  int t = node[n.L].R;
  node[n.L].R = root;
  root = n.L;
  n.L = t;
  update(node[root].R);
  update(root);
}

void rotate_left(int &root){
  Node &n = node[root];
  int t = node[n.R].L;
  node[n.R].L = root;
  root = n.R;
  n.R = t;
  update(node[root].L);
  update(root);
}

int add(int &root, pair<int,int> label){
  if (root==-1){
    if (fnode_size == 0){
      assert(next_free_idx < MAXQ);
      root = next_free_idx++;
    } else {
      root = fnode[--fnode_size];
    }
    Node &n = node[root];
    n.label = label;
    n.size = 0;
    n.depth = 1;
    n.L = n.R = -1;
    return 0;
  }

  Node &n = node[root];
  if (node[root].label == label) return 0; // already added, ignore

  if (label < n.label){
    add(n.L, label);
    if (depth(n.L) > depth(n.R)+1){ // rotate right
      int t = node[n.L].R;
      node[n.L].R = root;
      root = n.L;
      n.L = t;
      update(node[root].R);
    }
  } else if (label > n.label){
    add(n.R, label);
    if (depth(n.L)+1 < depth(n.R)){ // rotate left
      int t = node[n.R].L;
      node[n.R].L = root;
      root = n.R;
      n.R = t;
      update(node[root].L);
    }
  }
  update(root);
  return 0;
}

void traverse(int root, pair<int,int> label, int hi){
  if (root==-1) return;
  Node &n = node[root];
  if (label <= n.label) traverse(n.L, label, hi);
  if (hi >= n.label.first) traverse(n.R, label, hi);
  if (n.label >= label && n.label.first <= hi)
    idxs[idxs_size++] = n.label.second;
}

pair<int,int> del(int &root, int sign){
  Node &n = node[root];
  pair<int,int> label;
  if (sign>0){
    if (n.R==-1){
      label = n.label;
      fnode[fnode_size++] = root;
      root = n.L;
    } else {
      label = del(n.R,sign);
    }
  } else {
    if (n.L==-1){
      label = n.label;
      fnode[fnode_size++] = root;
      root = n.R;
    } else {
      label = del(n.L,sign);
    }
  }
  update(root);
  return label;
}

void remove(int &root, pair<int,int> label){
  if (root==-1) return; // not found, ignore
  Node &n = node[root];
  if (label == n.label){
    if (n.L!=-1){
      n.label = del(n.L,1);
    } else if (n.R!=-1){
      n.label = del(n.R,-1);
    } else {
      fnode[fnode_size++] = root;
      root = -1;
    }
  } else if (label < n.label){
    remove(n.L, label);
  } else if (label > n.label){
    remove(n.R, label);
  }
  update(root);
}


int X[MAXN+1], Y[MAXN+1];
inline int d1(int i){ return X[i] + Y[i]; }
inline int d2(int i){ return X[i] - Y[i]; }

struct RangeTrees {
  int Yidx[MAXW];
  void clear(){ memset(Yidx,-1,sizeof(Yidx)); }
  void insert(int i, int xL, int xR, int x, int y, int id){
    assert(i >= 0 && i < MAXW);
    assert(0 <= x && x < MAXW/2);
    add(Yidx[i], make_pair(y,id));
    if (xL == xR) return;
    int xM = (xL + xR) / 2;
    if (x <= xM) insert(i*2+1, xL, xM, x, y, id);
    if (x  > xM) insert(i*2+2, xM+1, xR, x, y, id);
  }
  void erase(int i, int xL, int xR, int x, int y, int id){
    assert(i >= 0 && i < MAXW);
    assert(0 <= x && x < MAXW/2);
    remove(Yidx[i], make_pair(y,id));
    if (xL == xR) return;
    int xM = (xL + xR) / 2;
    if (x <= xM) erase(i*2+1, xL, xM, x, y, id);
    if (x  > xM) erase(i*2+2, xM+1, xR, x, y, id);
  }
  void query(int i, int xL, int xR, int x1, int x2, int y1, int y2){
    assert(i >= 0 && i < MAXW);
    assert(0 <= x1 && x1 <= x2 && x2 < MAXW/2);
    assert(y1 <= y2);
    if (x1 <= xL && xR <= x2){
      traverse(Yidx[i], make_pair(y1,-1), y2);
      return;
    }
    if (xL == xR) return;
    int xM = (xL + xR) / 2;
    if (x1 <= xM) query(i*2+1, xL, xM, x1, x2, y1, y2);
    if (x2  > xM) query(i*2+2, xM+1, xR, x1, x2, y1, y2);
  }
} B;

int main(){
  int T,N,Q,W,H,Xa,Ya,Ea,a,b,c,d,e,f;
  scanf("%d",&T);
  clock_t st = clock();
  for (int TC=1; TC<=T; TC++){
    clock_t t1 = clock();
    printf("Case #%d:\n",TC);
    scanf("%d %d %d %d",&N,&Q,&W,&H);
    assert(N <= MAXN);
    next_free_idx = fnode_size = 0;
    B.clear();
    REP(i,N){
      scanf("%d %d",&X[i],&Y[i]);
      B.insert(0,0,MAXW/2-1, d1(i),d2(i),i);
    }

    int nabd = 0;
    REP(q,Q){
      scanf("%d %d %d %d %d %d %d %d %d",&Xa,&Ya,&Ea,&a,&b,&c,&d,&e,&f);
      int x1 = max(0,Xa+Ya-Ea), 
        x2 = min(MAXW/2-1,Xa+Ya+Ea),
        y1 = Xa-Ya-Ea, y2 = Xa-Ya+Ea;
      idxs_size = 0;
      B.query(0,0,MAXW/2-1, x1,x2,y1,y2);
      nabd += idxs_size;
      REP(j,idxs_size){
        int i = idxs[j];
        B.erase(0,0,MAXW/2-1, d1(i),d2(i),i);
        long long x = X[i], y = Y[i], id = i+1;
        X[i] = (x * a + y * b + id * c) % W;
        Y[i] = (x * d + y * e + id * f) % H;
        B.insert(0,0,MAXW/2-1, d1(i),d2(i),i);
      }
    }
    REP(i,N) printf("%d %d\n",X[i],Y[i]);
    fprintf(stderr,"Case #%2d: abducted = %5d, runtime = %.3lf\n",
      TC, nabd, 1.0 * (clock()-t1) / CLOCKS_PER_SEC );
    assert(nabd <= MAXA);
  }
  fprintf(stderr,"Total runtime = %.3lf\n", 1.0*(clock()-st) / CLOCKS_PER_SEC );
}
