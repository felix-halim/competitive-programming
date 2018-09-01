#include <stdio.h>
#include <string.h>
#include <vector>
#include <set>
#include <map>
#include <string>
#include <algorithm>

using namespace std ;

#define FOR(i,a,b) for (int i=(a),_b=(b); i<=_b; i++)
#define REP(i,n) for (int i=0,_n=(n); i<_n; i++)
#define FOREACH(it,arr) for(typeof((arr).begin()) it=(arr).begin(); it!= (arr).end(); it++)

char p1[10],p2[10],c[10];

char sol[1000][3];
char *abo = "ABO";
char *pm = "+-";

void prepare(char* ayah){
	ayah[4] = '\0';
	if (ayah[0]>ayah[1]) swap(ayah[0],ayah[1]);
	if (ayah[2]>ayah[3]) swap(ayah[2],ayah[3]);
}

char ayah[5], ibu[5], anak[5];
map<pair<string,string>,set<string> > sols;

void calcAnak(){
	prepare(ayah);
	prepare(ibu);
//	printf("ayah = %s,	ibu = %s\n",ayah,ibu);

	set<string> cs;
	FOR(i,0,1) FOR(j,0,1){
		FOR(x,2,3) FOR(y,2,3) {
			anak[0] = ayah[i];
			anak[1] = ibu[j];
			anak[2] = ayah[x];
			anak[3] = ibu[y];
			prepare(anak);
			cs.insert(string(anak));
		}
	}

	sols[make_pair(string(ayah),string(ibu))] = cs;
	/*
	printf("size = %d\n",cs.size());
	FOREACH(it,cs){
		printf("\t%s\n",it->c_str());
	}
	*/
}

vector<string> getComb(char *s){
		vector<string> ret;
		if (s[0]=='A' && s[1]=='B'){
			if (s[2]=='+'){
				ret.push_back("AB++");
				ret.push_back("AB+-");
			} else {
				ret.push_back("AB--");
			}
		} else if (s[0]=='A'){
			if (s[1]=='+'){
				ret.push_back("AA++");
				ret.push_back("AA+-");
				ret.push_back("AO++");
				ret.push_back("AO+-");
			} else {
				ret.push_back("AA--");
				ret.push_back("AO--");
			}
		} else if (s[0]=='B'){
			if (s[1]=='+'){
				ret.push_back("BB++");
				ret.push_back("BB+-");
				ret.push_back("BO++");
				ret.push_back("BO+-");
			} else {
				ret.push_back("BB--");
				ret.push_back("BO--");
			}
		} else if (s[0]=='O'){
			if (s[1]=='+'){
				ret.push_back("OO++");
				ret.push_back("OO+-");
			} else {
				ret.push_back("OO--");
			}
		}
		return ret;
}

bool exist(vector<string> &vs, string &t){
	REP(i,vs.size()) if (vs[i]==t) return true;
	return false;
}

string printBlood(string s){
	string ret = "";
	if (s[0]=='A' && s[1]=='B') ret += ("AB");
	else if (s[0]=='A') ret += ("A");
	else if (s[0]=='B') ret += ("B");
	else ret += ("O");

	if (s[2]=='+') ret += ("+");
	else ret += ("-");
	return ret;
}

void printRes(set<string> &res){
//	printf("size = %d\n",res.size());
	if (res.size()==0) printf("IMPOSSIBLE");
	else if (res.size()==1){
		printf("%s", printBlood(*res.begin()).c_str());
	} else {
		printf("{");
		bool first = true;
		set<string> tres;
		FOREACH(it,res) tres.insert(printBlood(*it));
		FOREACH(it,tres){
			if (first) first = false;
			else printf(", ");
			printf("%s",it->c_str());
		}
		printf("}");
	}
}

int main(){
	freopen("blood.in","r",stdin);

	REP(i,3) REP(j,3) REP(k,2) REP(l,2) {
		REP(x,3) REP(y,3) REP(z,2) REP(v,2) {
			ayah[0] = abo[i];
			ayah[1] = abo[j];
			ayah[2] = pm[k];
			ayah[3] = pm[l];

			ibu[0] = abo[x];
			ibu[1] = abo[y];
			ibu[2] = pm[z];
			ibu[3] = pm[v];

			/*
			printf("%c%c%c%c x %c%c%c%c = \n",
				abo[i],abo[j],pm[k],pm[l],
				abo[x],abo[y],pm[z],pm[v]);
			*/

			calcAnak();

//			printf("%c%c%c%c\n",anak[0],anak[1],anak[2],anak[3]);
		}
	}

	for (int TC=1; scanf("%s %s %s",p1,p2,c)!=EOF; TC++){
		char tt[] = { p1[0], p2[0], c[0], '\0' };
		sort(tt,tt+3);
		if (strcmp(tt,"DEN")==0) break;

		vector<string> cp1 = getComb(p1);
		vector<string> cp2 = getComb(p2);
		vector<string> cp3 = getComb(c);

		set<string> res;
		FOREACH(it,sols){
			string ay = it->first.first;
			string ib = it->first.second;
			FOREACH(it2,it->second){
				string an = *it2;

				if (c[0]=='?'){
					if(exist(cp1,ay) && exist(cp2,ib)){
						res.insert(an);
					}
				} else if (p1[0]=='?'){
					if (exist(cp2,ib) && exist(cp3,an)){
						res.insert(ay);
					}
				} else if (p2[0]=='?'){
					if (exist(cp1,ay) && exist(cp3,an)){
						res.insert(ib);
					}
				}
			}
		}

		printf("Case %d: ", TC);
		if (p1[0]=='?') printRes(res); else printf("%s",p1);
		printf(" ");
		if (p2[0]=='?') printRes(res); else printf("%s",p2);
		printf(" ");
		if (c[0]=='?') printRes(res); else printf("%s",c);
		printf("\n");
	}
}

