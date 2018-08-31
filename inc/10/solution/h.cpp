#include <stdio.h>

#define REP(i,n) for (int i=0,_n=(n); i<_n; i++)

int T,N,E,Q,R,a,b,P[50010],pset[50010],ea[200010],eb[200010],D[200010];
int findSet(int i){ return (pset[i]==i)? i : (pset[i] = findSet(pset[i])); }
void merge(int i, int j){ pset[findSet(i)] = findSet(j); }
int sameSet(int i, int j){ return findSet(i)==findSet(j); }

int main(){
    scanf("%d",&T);
    while (T--){
        scanf("%d %d %d %d",&N,&E,&Q,&R);
        REP(i,N+1) pset[i] = i, P[i] = 0;
        REP(i,E) scanf("%d %d",&ea[i],&eb[i]), D[i] = 0;
        REP(i,Q) scanf("%d",&a), P[a] = 1;
        REP(i,R) scanf("%d",&a), D[a-1] = 1;
        REP(i,E) if (!D[i] && !sameSet(ea[i],eb[i])){
            a = P[findSet(ea[i])];   // a = banyaknya special node di komponen ea[i]
            b = P[findSet(eb[i])];   // b = banyaknya special node di komponen eb[i]
            merge(ea[i],eb[i]);      // gabung komponen ea[i] dengan eb[i]
            P[findSet(ea[i])] = a+b; // banyaknya special node gabungan adalah a+b
        }
        long long res = 0;
        REP(i,N){
            a = findSet(i+1);        // a = komponen dari node i
            b = P[a];                // b = banyaknya special node di komponen a
            res += (Q-b)*b;          // (banyaknya special node di luar komponen a) * b
            P[a] = 0;                // komponen a telah diprocess
        }
        printf("%lld\n",res/2);      // double counting
    }
}
