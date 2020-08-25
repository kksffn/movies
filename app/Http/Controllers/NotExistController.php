<?php

namespace App\Http\Controllers;

class NotExistController extends Controller
{
    public function notFound()
    {
        return view( 'errors/notFound')
            ->with('title', 'OOOPS')
            ->with('heading', 'Couldn\'t find what you are searching for')
            ->with('explanation', 'You needn\'t be sorry about that. I prepared another stuff for you:')
            ->with('text',
            'Propagators weakly asso
iated to a family of
Hamiltonians and the adiabati
 theorem for
the Landau Hamiltonian with a
time-dependent Aharonov-Bohm ux
J. As
h1,2
, I. Hrade
ký3
, P. ´oví£ek3
1Centre de Physique Théorique, CNRS, Luminy, Case 907, Marseille Cedex
9, Fran
e
2CPTPhyMat, Université du Sud ToulonVar, BP 20132, F-83957 La
Garde Cedex, Fran
e
3Department of Mathemati
s, Fa
ulty of Nu
lear S
ien
e, Cze
h Te
hni
al
University, Trojanova 13, 120 00 Prague, Cze
h Republi
Abstra
t
We study the dynami
s of a quantum parti
le moving in a plane
under the inuen
e of a
onstant magneti
 eld and driven by a slowly
time-dependent singular ux tube through a pun
ture. The known
adiabati
 results do not
over these models as the Hamiltonian has
time dependent domain. We give a meaning to the propagator and
prove an adiabati
 theorem. To this end we introdu
e and develop
the new notion of a propagator weakly asso
iated to a time-dependent
Hamiltonian.
1 Introdu
tion
The model under
onsideration originates from Laughlin\'s [13℄ and Halperin\'s
[9℄ dis
ussion of the Integer Quantum Hall ee
t. In the mathemati
al physi
s
literature Bellissard [5℄ and Avron, Seiler, Simon [3℄ used an adiabati
 limit
1
of the model (with additional randomness) to introdu
e indi
es. The indi
es
explain the quantization of
harge transport observed in the experiments [12℄.
In this paper we dis
uss some mathemati
al aspe
ts of the existen
e of
the propagator and the validity of the adiabati
 approximation and propose
how to over
ome the di
ulties originating from the strong singularity of the
external eld.
Let us spe
ify the model, summarize our results and introdu
e the notation. The
onguration spa
e is R
2 \ {(0, 0)} and the model is
onsidered in
polar
oordinates (r, θ). The ve
tor potential A is the sum of a part for the
homogeneous magneti
 eld of strength B > 0,
B
2
(x1dx2 − x2dx1) = Br2
2
dθ,
plus a part des
ribing the ux Φ whi
h varies in time,
Φ
2π
1
|~x|
2
(x1dx2 − x2dx1) = Φ
2π
dθ;
the real-valued fun
tion Φ is assumed to be monotonous and C
2
. With the
metri

oe
ients g11 = 1, g22 = r
2
, g12 = 0, the dierential expression of
the Hamiltonian a
ting in L
2
(R+ × [0, 2π[ , rdrdθ) is
1
2m

−i~∂j −
e
c
Aj
 √
ggjk 
−i~∂k −
e
c
Ak

=
~
2
2m

−
1
r
∂rr∂r +
1
r
2

−i∂θ −
e
~c
Br2
2
−
e
hc Φ
2
!
.
Our purpose is to study the response of the system if ux quanta hc/e are
added adiabati
ally, i.e. the ux fun
tion is of the form t 7→ Φ(t/τ ) with the
time t varying in [ 0, τ ] for some τ ≫ 1.
In a rst step we analyze the
ase when Φ is linear. Furthermore, we x
an angular momentum se
tor dened by −i∂θe
imθ = meimθ (m ∈ Z), and use
a slow time s, i.e.: the substitution s = −m + e/(hc)Φ(t/τ ). Also we are not
interested here in keeping tra
k of the behavior in the physi
al parameters e,
~, c, 2m, so we set them all equal to one. This is our motivation to
onsider
the operator
H(s) = −
1
r
∂rr∂r +
1
r
2

s +
Br2
2
2
in L
2
(R+, rdr). (1)
In a se
ond step we shall then show that our analysis generalizes to Hamiltonians of the form H

ζ(s)

where ζ ∈ C
2
is a monotone fun
tion.

H(s) is essentially selfadjoint on C
∞
0
(]0, ∞[) i s
2 ≥ 1 [14℄. For 0 < s2 < 1
we impose the regular boundary
ondition as r → 0+ (i.e.: a wavefun
tion
belongs to the domain if it has no part proportional to the (square integrable)
singularity r
−|s|
). This is in fa
t the most
ommon
hoi
e, see [8℄ for a
detailed dis
ussion. The
ase s = 0 is parti
ular sin
e the singularity in
question is logarithmi
 but otherwise the situation is similar, see [1℄. The
Hamiltonian H(s) is unambiguously determined by spe
ifying a
omplete set
of eigenfun
tions with
orresponding eigenvalues, see below.
The dynami
s of the model should be dened by
i∂sUτ (s, s0)ψ = τH(s)Uτ (s, s0)ψ, Uτ (s0, s0)ψ = ψ, (2)
where Uτ is unitary and ψ is an arbitrary initial
ondition from the domain
of H(s0). The existen
e of a propagator in this sense is, however, un
ertain.
The problem arises from the fa
t that the domain of H(s) is not
onstant in s,
respe
tively that H˙ (s) is not relatively bounded with respe
t to H(s). Thus
the usual theorems whi
h assure the existen
e of the propagator [14℄ and the
validity of the adiabati
 approximation [4, 2℄ are not dire
tly appli
able.
A
onvenient way to see this is to
onsider the eigenfun
tions. The operator H(s) has a simple dis
rete spe
trum; the eigenvalues are
λn(s) = B(s + |s| + 2n + 1), n ∈ {0, 1, 2, . . .}, (3)
with the
orresponding normalized eigenfun
tions
ϕn(s; r) = cn(s) r
|s| L
(|s|)
n

Br2
2

exp
−
Br2
4

where
cn(s) = 
B
2
(|s|+1)/2 
2 n!
Γ(n + |s| + 1)1/2
are the normalization
onstants and L
(|s|)
n are the generalized Laguerre polynomials (see, for example, [8℄).
The derivative of H(s) equals
H˙ (s) = 2s
r
2
+ B.
Noti
e that if |s| ≤ 1 then ϕn(s)
annot belong to the domain Dom H˙ (s)
sin
e H˙ (s)ϕn(s) ∼ r
−2+|s|
for r → 0+. This means that H˙ (s) is not relatively
bounded with respe
t to H(s).
3
Remark that, on the other hand, the quadrati
 expression
Z ∞
0
ϕm(s; r) H˙ (s)ϕn(s; r) r dr
makes good sense. In order to avoid a
ompli
ated notation we shall denote
it by the symbol hϕm(s), H˙ (s)ϕn(s)i even though the symbol
annot be taken
literally and is therefore somewhat misleading. Furthermore, the derivative
of the eigenfun
tion, ϕ˙ n(s), belongs to L
2
(R+, r dr). Sin
e the eigenfun
tions
are
hosen to be real-valued it holds true that
hϕn(s), ϕ˙ n(s)i = 0.
Let us also note that, similarly, if |s| ≤ 1 and s
2 6= s
′2
then the eigenfun
tion ϕn(s)
annot belong to Dom H(s
′
). It is so be
ause (as formal
expressions) H(s
′
) − H(s) = (s
′2 − s
2
)/r2 + B(s
′ − s) and H(s
′
)ϕn(s; r) has
a non-integrable singularity at r = 0. Hen
e Dom H(s) depends on s.
It turns out that, following the strategy of Born and Fo
k [7℄, the problems
of existen
e and adiabati
 approximation
an both be handled:
denote the eigenpro je
tor onto Cϕn(s) by Pn(s); it is dierentiable as a
bounded operator. The hard part of our work
onsists in showing that
i
X∞
k=0
P˙
k(s)Pk(s)
is a bounded operator. This is stated in Lemma 6. It requires work be
ause
its matrix elements have bad odiagonal de
ay, see Lemma 4 (whi
h is
formulated for the unitarily equivalent operator Q).
Now
HAD(s) := H(s) + i
τ
X∞
n=0
P˙
n(s)Pn(s)
has a propagator whi
h is well dened in the usual way, i.e.
i∂sUAD(s, s0)ψ = τHAD(s)UAD(s, s0)ψ, UAD(s0, s0)ψ = ψ, (4)
for ψ ∈ Dom (HAD(s0)). To see this noti
e that UAD
an be
omputed by its
a
tion on the eigenbasis:
UAD(s, s0)ϕn(s0) = e
−iτ R s
s0
λn(u) du
ϕn(s).
Furthermore, λn(s)−λn(0) is bounded in n and so UAD(s, s0) Dom HAD(s0) =
Dom HAD(s).
4
Sin
e H(s) − HAD(s) is bounded the domains of H(s) and HAD(s) are
identi
al. By time-dependent transformation a natural
andidate for the
propagator of H(s) is
Uτ (s, s0) := UAD(s, 0)C(s, s0)UAD(0, s0) (5)
where C(s, s0) is dened by
i∂sC(s, s0) = −Qτ (s)C(s, s0), C(s0, s0) = I, (6)
with
Qτ (s) := UAD(0, s)

i
X∞
k=0
P˙
k(s)Pk(s)
!
UAD(s, 0). (7)
Sin
e kQτ (s)k is lo
ally bounded the propagator C(s, s0) is well dened by
the Dyson formula.
The adiabati
 approximation problem is settled in Proposition 11 were it
is shown that
kUτ (s, 0) − UAD(s, 0)k = O

1
τ

.
It remains un
lear, however, whether C(s, s0) preserves the domain of
H(0) and therefore whether the propagator Uτ (s, s0) is a
tually related to
the Hamiltonian H(s) in the usual sense. To handle this problem we develop
the general
on
ept of weak asso
iation of a propagator and a time dependent
Hamiltonian. We
an show that Uτ is weakly asso
iated to H(s) and that
the S
hrödinger equation (2) is fullled in the sense of distributions.
We shall use the following notation. The symbol V (s) stands for the
unitary operator whi
h sends all eigenstates at time 0 to the
orresponding
eigenstates at time s, i.e.
V (s)ϕn(0) = ϕn(s) ∀n ∈ Z+ (8)
(here and everywhere in what follows Z+ stands for the set of nonnegative
integers). Further set
W(s) = V (s)
−1H(s)V (s) = X∞
n=0
λn(s) Pn(0) (9)
and
Ω(s) = X∞
n=0
ωn(s) Pn(0) (10)
5
where
ωn(s) = Z s
0
λn(u) du.
Remark that the adiabati
 propagator de
omposes as
UAD(s, s0) = V (s)e
−iτ(Ω(s)−Ω(s0))V (s0)
−1
.
The paper is organized as follows. In Se
tions 2 and 3 we do the analysis
ne
essary to prove the boundedness result stated in Lemma 6. Se
tion 4 is
devoted to the existen
e problem for the propagator. In Se
tion 5 we prove
the adiabati
 theorem in Proposition 11. The result is then extended to a
more general time-dependen
e in Se
tion 6.
A rather independent part of the paper is the Appendix where we propose
the notion of a propagator weakly asso
iated to a time-dependent Hamiltonian. We indi
ate
ases where the weak asso
iation
an be veried while
the usual relationship between a propagator and a Hamiltonian is un
lear or
even is not valid. In parti
ular, this
on
ept was inspired by the situation we
en
ountered in the present model. We believe, however, that this idea need
not be restri
ted to this
ase only and that it might turn out to be useful in
resolving this type of di
ulties in other models as well.
2 Auxiliary estimates of matrix operators
Here we derive some auxiliary estimates that will be useful later when verifying assumptions of the adiabati
 theorem.
Lemma 1. Let A(σ) be an operator in l
2
(N) depending on a parameter σ ≥ 0
whose matrix entries in the standard basis equal
A(σ)mn =



0 for m = n
−
i
n
m
n
σ
for m < n
i
m

n
m
σ
for m > n
.
Then A(σ) is bounded, uniformly in σ, and its norm satises the estimate
kA(σ)k ≤ 24.
Proof. The proof will be done in several steps.
(i) Let K(σ) be an integral operator a
ting in L
2
(R+, dx) with the integral
kernel
Kσ(x, y) = (
−
i
y

x
y
σ
for x < y
i
x

y
x
σ
for x > y

Let us show that
kK(σ)k =
2
2σ + 1
.
First we apply the unitary transform
U : L
2
(R+, dx) → L
2
(R, dy), Uψ(y) = e
y/2ψ(e
y
). (11)
The inverse transform reads U
−1ψˆ(x) = x
−1/2ψˆ(ln x). Set
K˜ (σ) = UK(σ)U
−1
.
One nds that K˜ (σ) is again an integral operator with the integral kernel
K˜
σ(y, z) = isgn(y − z) e
−(σ+1/2)|y−z|
.
Hen
e K˜ (σ) is a
onvolution operator and it is therefore diagonalizable with
the aid of the Fourier transform F on R. This means that

FK˜ (σ)F
−1ψ

(z) = ˆq(z)ψ(z)
where
qˆ(z) = Z
R
e
izy sgn(y) e
−(σ+1/2)|y|
dy =
2iz

σ +
1
2
2
+ z
2
.
It follows that
kK(σ)k = kFK˜ (σ)F
−1
k = kqˆk∞ =
1
σ +
1
2
. (12)
(ii) Suppose that {ψ}
∞
n=1 is an orthogonal system in L
2
(R+, dx) su
h that
∀m, n ∈ N, hψm, K(σ)ψni = A(σ)mn
and
∀n ∈ N, kψnk
2 = κ > 0.
Let P+ be the orthogonal proje
tor onto span{ψn}
∞
n=1 in L
2
(R+, dx). Then
one
an identify P+K(σ)P+ with κ
−1A(σ). Hen
e
kA(σ)k = κkP+K(σ)P+k ≤ κkK(σ)k. (13)
(iii) We shall
onstru
t an orthogonal system {ψn}
∞
n=1 des
ribed in the
pre
eding point as follows. Consider the natural embedding L
2
([n, n+1], dx) ⊂
L
2
(R+, dx), n ∈ N. We seek ψn ∈ L
2
([n, n + 1], dx) in the form
ψn = αnun + βnvn + fn
where αn, βn ∈ R, un, vn, fn ∈ L
2
([n, n + 1], dx),
un(x) = x
σ
, vn(x) = x
−σ−1
for x ∈ [n, n + 1],
and fn ⊥ un, fn ⊥ vn. Suppose for deniteness that m < n. Then
hψm, K(σ)ψni =
Z m+1
m
dx
Z n+1
n
dy Kσ(x, y) ψm(x) ψn(y)
= −ihum, ψmi hvn, ψni.
Furthermore,
hψn, K(σ)ψni =
Z n+1
n
Z n+1
n
Kσ(x, y) ψn(x) ψn(y) dxdy = 0
sin
e Kσ(x, y) is antisymmetri
, Kσ(y, x) = −Kσ(x, y). Consequently, it
su
es to
hoose the real
oe
ients αn, βn so that
∀n ∈ N, hun, ψni = n
σ
, hvn, ψni = n
−σ−1
.
This system has a unique solution (αn, βn). The fun
tion fn
an be arbitrary.
Its only purpose is to adjust the norms of the fun
tions ψn so that they are
all equal. Set
Nn(σ) = kαnun + βnvnk
2 =
Z n+1
n

αnx
σ + βnx
−σ−1
2
dx
and
κ(σ) = sup
n∈N
Nn(σ).
One
an
hoose the orthogonal system {ψn}
∞
n=1 so that kψnk
2 = κ(σ) for all
n. A

ording to (12) and (13) we have
kA(σ)k ≤ 2 κ(σ)
2σ + 1
. (14)
(iv) It remains to nd an upper bound on κ(σ). Set
ξn = n
σ
, ηn = n
−σ−1
.
Simple algebrai
 manipulations yield
Nn(σ) = hvn, vni ξ
2
n − 2 hun, vni ξnηn + hun, uni η
2
n
hun, uni hvn, vni − hun, vni
2
.

Here
hun, vni = ln
1 +
1
n

,
hun, uni =
1
2σ + 1

(n + 1)2σ+1 − n
2σ+1
,
hvn, vni =
1
2σ + 1

n
−2σ−1 − (n + 1)−2σ−1

.
Set
w =

σ +
1
2

ln
1 +
1
n

.
One
an rewrite the expression for Nn(σ) as follows,
Nn(σ) = 2σ + 1
n
sinh(w) cosh(w) − w
sinh2
(w) − w2
.
Using an elementary analysis one
an show that
sinh(w) cosh(w) − w
sinh2
(w) − w2
≤
sinh(w) cosh(w) − w
sinh(w) (sinh(w) − w)
≤ 4 cotgh(w).
Hen
e
Nn(σ) ≤
4(2σ + 1)
n

1 + 1
n
2σ+1 + 1

1 + 1
n
2σ+1
− 1
≤ 12(2σ + 1).
Consequently,
κ(σ) ≤ 12(2σ + 1). (15)
From (14) and (15) it follows that kA(σ)k ≤ 24.
Lemma 2. Let A(σ) be an operator in l
2
(N) whose matrix entries in the
standard basis equal
A(σ)mn =



0 for m = n
−
i
n
fσ
m
n

for m < n
i
m
fσ

n
m

for m > n
where
fσ(u) = 1 − u
σ
1 − u
, u ∈ ]0, 1[ ,
and σ ∈ [0, 1] is a parameter. Then A(σ) is bounded and its norm satises
the estimate
kA(σ)k ≤ √
2
3
+ 4!
π
2
Proof. The proof will be done in several steps.
(i) Let K(σ) be an integral operator a
ting in L
2
(R+, dx) with the integral
kernel
Kσ(x, y) = (
−
i
y
fσ

x
y

for x < y
i
x
fσ

y
x

for x > y
.
Let us show that
kK(σ)k ≤ π
2σ. (16)
This step is quite analogous to the proof of point (i) in Lemma 1. First we
apply the unitary transform U dened in (11). Set
K˜ (σ) = UK(σ)U
−1
.
One nds that K˜ (σ) is again an integral operator with the integral kernel
K˜
σ(y, z) = isgn(y − z) fσ

e
−|y−z|

e
−|y−z|/2
.
Thus K˜ (σ) is a
onvolution operator whi
h is diagonalizable with the aid
of the Fourier transform F on R. This means that
FK˜ (σ)F
−1ψ

(z) =
qˆ(z)ψ(z) where
qˆ(z) = Z
R
e
izy sgn(y) fσ

e
−|y|

e
−|y|/2
dy.
A standard estimate yields
|qˆ(z)| ≤ 2
Z ∞
0
1 − e
−σy
1 − e
−y
e
−y/2
dy ≤ σ
Z ∞
0
y
sinh(y/2) dy = π
2σ.
It follows that
kK(σ)k = kFK˜ (σ)F
−1
k = kqˆk∞ ≤ π
2σ.
(ii) Let χn(x) be the
hara
teristi
 fun
tion of the interval ]n, n + 1[ .
The linear mapping
J : l
2
(N) → L
2
(R+, dx) : {ξn} 7→ X∞
n=1
ξnχn
is an isometry. The adjoint mapping reads
J
∗
: L
2
(R+, dx) → l
2
(N) : ψ 7→ {hχn, ψi}∞
n=1.
Set
L(σ) = JA(σ)J
∗

L(σ) is an integral operator with the kernel
Lσ(x, y) = X∞
m=1
X∞
n=1
A(σ)mnχm(x)χn(y).
This
an be rewritten as
Lσ(x, y) =



−
i
[y]
fσ

[x]
[y]

if 0 < [x] < [y]
i
[x]
fσ

[y]
[x]

if 0 < [y] < [x]
0 otherwise
.
Here [x] denotes the integer part of x. Noti
e that J
∗J is the identity on
l
2
(N) and so L(σ)J = JA(σ). Consequently,
kA(σ)k = kJA(σ)k = kL(σ)Jk ≤ kL(σ)k. (17)
(iii) Denote by P˜
n, n ∈ Z+, the orthogonal proje
tor onto Cχn in L
2
(R+, dx).
Set
K o(σ) = K(σ) − P˜
0K(σ) − K(σ)P˜
0 + P˜
0K(σ)P˜
0 −
X∞
n=1
P˜
nK(σ)P˜
n.
In other words, we subtra
t from K(σ) the diagonal as well as the rst
row and the rst
olumn (i.e., with index 0) with respe
t to the orthogonal
system {χn}
∞
n=0. We
an say also that the integral kernel Ko
σ
(x, y) vanishes
if [x] = [y] or [x] = 0 or [y] = 0 and otherwise it
oin
ides with Kσ(x, y).
Sin
e





P˜
0K(σ)P˜
0 −
X∞
n=1
P˜
nK(σ)P˜
n





= sup
n∈Z+
kP˜
nK(σ)P˜
nk ≤ kK(σ)k
we have
kK o(σ)k ≤ 4kK(σ)k. (18)
(iv) It remains to estimate the norm of the dieren
e L(σ) − K o(σ).
This is a Hermitian integral operator whose kernel does not vanish only if
0 < [x] < [y] or 0 < [y] < [x]. Suppose for deniteness that 0 < [x] < [y].
Then the kernel equals, up to the multiplier −i,
1
[y]
fσ

[x]
[y]

−
1
y
fσ

x
y

=

1
[y]
σ
−
1
y
σ

[y]
σ − [x]
σ
[y] − [x]
+
1
y
σ

[y]
σ − [x]
σ
[y] − [x]
−
y
σ − x
σ
y − x

.
11
Let us show that
0 ≤
1
[y]
fσ

[x]
[y]

−
1
y
fσ

x
y

≤
2σ
[x]([y] − [x]). (19)
First noti
e that
0 ≤
1
[y]
σ
−
1
y
σ
= −σ
Z [y]
y
z
−σ−1
dz ≤
σ(y − [y])
[y]
σ+1
and so
0 ≤

1
[y]
σ
−
1
y
σ

[y]
σ − [x]
σ
[y] − [x]
≤
σ
[y]([y] − [x]) . (20)
Further set temporarily
D =
[y]
σ − [x]
σ
[y] − [x]
−
y
σ − x
σ
y − x
= σ
Z 1
0

([x](1 − t) + [y]t)
σ−1 − (x(1 − t) + yt)
σ−1

dt .
The integrand in the last integral equals
σ(1 − σ)ξ
σ−2
t
((x − [x])(1 − t) + (y − [y])t)
where ξt
is a real number lying between [x](1 − t) + [y]t and x(1 − t) + yt.
Noti
e that
0 ≤ (x − [x])(1 − t) + (y − [y])t ≤ 1.
We assume that 0 ≤ σ ≤ 1. Therefore
0 ≤ D ≤ σ(1 − σ)
Z 1
0
([x](1 − t) + [y]t)
σ−2
dt = −σ
[y]
σ−1 − [x]
σ−1
[y] − [x]
and so
0 ≤
1
y
σ D ≤
σ[x]
σ−1
y
σ([y] − [x]) ≤
σ
[x]([y] − [x]) . (21)
Inequalities (20) and (21) jointly imply (19).
(v) From estimate (19) one
an dedu
e that L(σ) − K o(σ) is a HilbertS
hmidt operator and
kL(σ) − K o(σ)kHS ≤
√
2 π
2
3
σ. (22)
1
A
tually,
kL(σ) − K o(σ)k
2
HS = 2 Z ∞
1
dx
Z ∞
[x]+1
dy

Lσ(x, y) − Ko
σ
(x, y)


2
≤ 8σ
2
Z ∞
1
dx
1
[x]
2
Z ∞
[x]+1
dy
1
([y] − [x])2
= 8σ
2
 X∞
k=1
1
k
2
!2
.
(vi) Inequalities (17), (18), (16) and (22) imply that
kA(σ)k ≤ kL(σ)k ≤ kK o(σ)k + kL(σ) − K o(σ)k ≤ 4π
2σ +
√
2 π
2
3
σ.
This shows the lemma.
Lemma 3. Let A(σ) be an operator in l
2
(N) with the matrix entries in the
standard basis
A(σ)mn =
(
0 for m = n
i
n−m min{
m
n
σ
,

n
m
σ
} for m 6= n
.
Then A(σ) is bounded for al l 0 ≤ σ and its norm satises the estimate
kA(σ)k ≤ π +
 √
2
3
+ 4!
π
2σ.
Proof. Let us rst show that
kA(0)k ≤ π.
For σ = 0 we get
A(0)mn =
i
n − m
if m 6= n.
Considering the natural embedding l
2
(N) ⊂ l
2
(Z) let us denote by P+ the
orthogonal proje
tor onto l
2
(N) in l
2
(Z). Let B be an operator in l
2
(Z) with
the matrix
Bmn = q(n − m) where q(n) = (
0 for n = 0
i
n
for n 6= 0
.

One
an identify A(0) with P+BP+. B is a
onvolution operator and therefore
it is diagonalizable by the Fourier transform F : l
2
(Z) → L
2
([0, 2π], dθ). In
more detail,

FBF
−1ψ

(θ) = ˆq(θ)ψ(θ) where qˆ(θ) = X
n∈Z
q(n) e
inθ
.
One nds that qˆ(θ) = −π + θ. Consequently,
kA(0)k = kP+BP+k ≤ kBk = kFBF
−1
k = max
θ∈[0,2π]
|qˆ(θ)| = π.
Suppose now that 0 < m < n. Noti
e that
(A(σ + 1) − A(σ))mn = −
i
n
m
n
σ
and
(A(σ) − A(0))mn = −
i
n
fσ
m
n

.
Using Lemma 1 and Lemma 2 one
an estimate
kA(σ)k ≤ kA(0)k + kA(σ − [σ]) − A(0)k + kA(σ − [σ] + 1) − A(σ − [σ])k
+ . . . + kA(σ) − A(σ − 1)k
≤ π +
 √
2
3
+ 4!
π
2
(σ − [σ]) + 24[σ]
≤ π +
 √
2
3
+ 4!
π
2σ.
This proves the lemma.
3 Boundedness of the operator i
P∞
k=0 P˙
k(s)Pk(s)
We
onsider i
P∞
k=0 P˙
k(s)Pk(s) in the time independent frame, i.e. the operator Q(s) dened by
Q(s) = iV (s)
∗X∞
k=0
P˙
k(s)Pk(s)V (s) = −iV˙ (s)
∗V (s) = iV (s)
∗V˙ (s). (23)
The operator V (s) is dened in (8). Q(s) is symmetri
 and its matrix entries
in the basis {ϕn(0)} are
hϕm(0), Q(s)ϕn(0)i = ihϕm(s), ϕ˙ n(s)i.
1
Sin
e ϕn(s) depends on s only through the absolute value it holds true that
Q(−s) = −Q(s) for s 6= 0. For s = 0 the operator-valued fun
tion Q(s) has
a dis
ontinuity. The goal of this se
tion is to show that the operator Q(s) is
in fa
t bounded.
To
ompute the matrix entries one
an use the identity
hϕm(s), ϕ˙ n(s)i =
D
ϕm(s), H˙ (s)ϕn(s)
E
λn(s) − λm(s)
. (24)
Let us emphasize on
e more that the s
alar produ
t on the RHS should
be interpreted as a quadrati
 form sin
e, in general, ϕn(s) 6∈ Dom H˙ (s).
The derivation goes through basi
ally as usual even though one
annot use
the s
alar produ
t dire
tly. Dierentiating the equation on eigenvalues one
arrives at the equality
H(s) ˙ϕn(s; r) + H˙ (s)ϕn(s; r) = λ˙
n(s)ϕn(s; r) + λn(s) ˙ϕn(s; r),
valid for any r > 0, in whi
h one should substitute for H(s) and H˙ (s) the

orresponding formal dierential operators. Next one multiplies the equality
by rϕm(s; r) and integrates the both sides from ε to innity for some ε > 0.
In the integral
−
Z ∞
ε
ϕm(s; r)∂rr∂rϕ˙ n(s; r) dr
o

urring on the LHS side one integrates twi
e by parts. Che
king the asymptoti
 behavior of the eigenfun
tions near the origin,
ϕn(s; r) ∼

B
2
(|s|+1)/2 
2 n!
Γ(n + |s| + 1)1/2
r
|s|

1 + O

r
2
 for r → 0+,
(25)
one nds that
limr→0+
rϕm(s; r)∂rϕ˙ n(s; r) = limr→0+
r (∂rϕm(s; r)) ˙ϕn(s; r) = 0.
Hen
e sending ε to 0 a
tually leads to equality (24).
Lemma 4. The matrix entries of the operator Q(s) for s 6= 0 are given by
the formulae
hϕm(0), Q(s)ϕn(0)i = 0 for m = n,
and
hϕm(0), Q(s)ϕn(0)i =
isgn(s)
2(n − m)
min 
γm(s)
γn(s)
,
γn(s)
γm(s)

for m 6= n,

where
γn(s) = 
Γ(n + |s| + 1)
n!
1/2
. (26)
Proof. Assume that m < n and s > 0. Using the expli
it expression for the
generalized Laguerre polynomials,
L
(α)
n
(x) = Xn
k=0
(−1)k

n + α
n − k

1
k!
x
k
,
one nds that
D
ϕm(s), H˙ (s)ϕn(s)
E
= 2s cm(s) cn(s)
×
Z ∞
0
r
2s−1L
(s)
m

Br2
2

L
(s)
n

Br2
2

exp
−
Br2
2

dr
= s cm(s) cn(s)

2
B
s
Sm,n
where
Sm,n =
Xm
k=0
Xn
ℓ=0
(−1)k+ℓ Γ(m + s + 1)Γ(n + s + 1)Γ(k + ℓ + s)
Γ(k + s + 1)Γ(ℓ + s + 1)m!n!

m
k
n
ℓ

.
In this expression only the summand with k = 0 does not vanish sin
e
Xn
ℓ=0
(−1)ℓ

n
ℓ

ℓ
j = 0 for j = 0, 1, . . . , n − 1,
Hen
e
Sm,n =
Γ(m + s + 1)Γ(n + s + 1)
Γ(s + 1)m!n!
Xn
ℓ=0
(−1)ℓ Γ(ℓ + s)
Γ(ℓ + s + 1) 
n
ℓ

=
Γ(m + s + 1)Γ(n + s + 1)
Γ(s + 1)m!n!
B(s, n + 1)
=
Γ(m + s + 1)
s m!
.
Furthermore, λn(s) − λm(s) = 2B(n − m) and so
hϕm(0), Q(s)ϕn(0)i = i

2
B
s
cm(s)cn(s)
2B(n − m)
Γ(m + s + 1)
m!
.
Now it su
es to plug in the expli
it expressions for the normalization
onstants cm(s) and cn(s).
16
Using the Stirling formula one
an
he
k the asymptoti
 behavior of the
matrix entries of the operator Q(s) for m and n large. It turns out that
the operator Q(s) is in some sense
lose to a Hermitian operator A(s) in
L
2
(R+, rdr) with the matrix entries
hϕm(0), A(s)ϕn(0)i = 0 for m = n, (27)
and
hϕm(0), A(s)ϕn(0)i =
isgn(s)
2(n − m)
min (
m + 1
n + 1 |s|/2
,

n + 1
m + 1|s|/2
)
for m 6= n. (28)
Note that A(0+) = Q(0+). We shall also write Q(s)mn instead of
hϕm(0), Q(s)ϕn(0)i, and similarly for A(s).
'

            );

    }

}
