#include <stdio.h>
#include <assert.h>

#define REP(i,n) for (int i=0,_n=n; i<_n; i++)

#define HSIZE 3000001
#define IS_EMPTY(key) (e[key].song == -1)
#define QLEN 10

struct Entry { short song, pos; } e[HSIZE];
int songs[2001][1001], query[10], N,Q,S;

bool equal(int *a, int *b){
    REP(i,QLEN) if (a[i]!=b[i]) return false;
    return true;
}

int lookup(int *melody){
    unsigned int H = 0;                     // the hash of the melody
    REP(i,QLEN) H += (H*13) ^ melody[i];    // simple hash function
    REP(i,HSIZE){
        int key = (H + i) % HSIZE;          // http://en.wikipedia.org/wiki/Linear_probing
        if (IS_EMPTY(key)) return -key;
        int *this_melody = songs[e[key].song] + e[key].pos;
        if (equal(melody, this_melody)) return key;
    }
    assert(false);                          // hash table is full!
}

int main(){
    REP(i,HSIZE) e[i].song = -1;            // set hash table to empty
    scanf("%d %d",&N,&Q);
    REP(i,N){
        scanf("%d",&S);
        REP(j,S) scanf("%d",&songs[i][j]);
        REP(j,S-QLEN+1){
            int key = -lookup(songs[i]+j);  // expected O(1)
            assert(key >= 0);               // should have no duplicate!
            e[key] = (Entry){i,j};          // insert into hash table
        }
    }
    REP(i,Q){
        REP(j,QLEN) scanf("%d",&query[j]);
        int key = lookup(query);            // expected O(1)
        if (key < 0) puts("not found");
        else printf("%d %d\n", e[key].song+1, e[key].pos+1);
    }
}
