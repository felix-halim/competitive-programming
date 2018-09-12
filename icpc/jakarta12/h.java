import java.util.*;
import java.io.*;

public class h {
  static final int MAXA = 50000;
  static final int MAXN = 100000;
  static final int MAXW = 131072;

  int[] X = new int[MAXN+2];
  int[] Y = new int[MAXN+2];

  int d1(int i){ return X[i] + Y[i]; }
  int d2(int i){ return X[i] - Y[i]; }

  class Pair implements Comparable<Pair> {
    int a,b;
    Pair(int a, int b){ this.a = a; this.b = b; }
    public int compareTo(Pair t){ return (a!=t.a)? (a-t.a) : (b-t.b); }
  }

  class RangeTrees {
    Set[] Y = new Set[MAXW];
    List<Integer> idxs = new ArrayList<Integer>();
    RangeTrees(){ for (int i=0; i<Y.length; i++) Y[i] = new TreeSet<Pair>(); }
    void clear(){ for (int i=0; i<Y.length; i++) Y[i].clear(); }
    void insert(int i, int xL, int xR, int x, int y, int id){
      assert(i >= 0 && i < MAXW);
      assert(0 <= x && x < MAXW/2);
      Y[i].add(new Pair(y,id));
      if (xL == xR) return;
      int xM = (xL + xR) / 2;
      if (x <= xM) insert(i*2+1, xL, xM, x, y, id);
      if (x  > xM) insert(i*2+2, xM+1, xR, x, y, id);
    }
    void erase(int i, int xL, int xR, int x, int y, int id){
      assert(i >= 0 && i < MAXW);
      assert(0 <= x && x < MAXW/2);
      Y[i].remove(new Pair(y,id));
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
        for (Pair p : ((TreeSet<Pair>)Y[i]).subSet(
          new Pair(y1,-1), new Pair(y2+1,-1))) idxs.add(p.b);
        return;
      }
      if (xL == xR) return;
      int xM = (xL + xR) / 2;
      if (x1 <= xM) query(i*2+1, xL, xM, x1, x2, y1, y2);
      if (x2  > xM) query(i*2+2, xM+1, xR, x1, x2, y1, y2);
    }
  }

  void run() throws Exception {
    RangeTrees B = new RangeTrees();
    Scanner scan = new Scanner(System.in);
    BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
    int T = Integer.parseInt(br.readLine());
    for (int TC=1; TC<=T; TC++){
      long t1 = System.nanoTime();
      System.out.print("Case #"+TC+":\n");
      String[] s = br.readLine().split(" ");
      int N = Integer.parseInt(s[0]);
      int Q = Integer.parseInt(s[1]);
      int W = Integer.parseInt(s[2]);
      int H = Integer.parseInt(s[3]);
      B.clear();
      for (int i=0; i<N; i++){
        s = br.readLine().split(" ");
        X[i] = Integer.parseInt(s[0]);
        Y[i] = Integer.parseInt(s[1]);
        B.insert(0,0,MAXW/2-1, d1(i),d2(i),i);
      }
      int nabd = 0;
      for (int q=0; q<Q; q++){
        s = br.readLine().split(" ");
        int Xa = Integer.parseInt(s[0]);
        int Ya = Integer.parseInt(s[1]);
        int Ea = Integer.parseInt(s[2]);
        int a = Integer.parseInt(s[3]);
        int b = Integer.parseInt(s[4]);
        int c = Integer.parseInt(s[5]);
        int d = Integer.parseInt(s[6]);
        int e = Integer.parseInt(s[7]);
        int f = Integer.parseInt(s[8]);
        int x1 = Math.max(0,Xa+Ya-Ea), 
          x2 = Math.min(MAXW/2-1,Xa+Ya+Ea),
          y1 = Xa-Ya-Ea, y2 = Xa-Ya+Ea;

        B.idxs.clear();
        B.query(0,0,MAXW/2-1, x1,x2,y1,y2);
        nabd += B.idxs.size();
        for (int i : B.idxs){
          B.erase(0,0,MAXW/2-1, d1(i),d2(i),i);
          long x = X[i], y = Y[i], id = i+1;
          X[i] = (int) ((x * a + y * b + id * c) % W);
          Y[i] = (int) ((x * d + y * e + id * f) % H);
          B.insert(0,0,MAXW/2-1, d1(i),d2(i),i);
        }
      }
      for (int i=0; i<N; i++)
        System.out.print(X[i]+" "+Y[i]+"\n");
      long t2 = System.nanoTime();
      System.err.printf("Case #%d: %8d %9.3fs\n",TC,nabd,(t2-t1)*1e-9);
    }
  }

  public static void main(String[] args) throws Exception {
    long t1 = System.nanoTime();
    new h().run();
    long t2 = System.nanoTime();
    System.err.printf("Runtime = %.3f\n", (t2-t1)*1e-9);
  }
}
